import axios from 'axios';
import { defineStore } from 'pinia';

interface Schema {
    version: string;
    databaseName: string;
    driver: string;
    platform: string;
}

interface Column {
    name: string;
    type: string;
    typeClass: string;
    length: number;
    precision: number;
    scale: number;
    unsigned: boolean;
    autoincrement: boolean;
    notnull: boolean;
    default: string;
    columnDefinition: boolean;
}

interface Index {
    name: string;
    isPrimary: boolean;
    isUnique: boolean;
}

interface Table {
    id: number;
    name: string;
    primaryKey: string;
    columns: [Column];
    indexes: [Index];
}

interface TreeNode {
    text: string;
    state?: object;
    children?: Array<string>;
}

interface TreeNodes {
    [key: string]: TreeNode;
}

export const useDatabaseStore = defineStore('database', {
    state: () => {
        return {
            tables: [] as Table[],
            schema: {} as Schema,
            treeConfig: {
                roots: ['Tables'],
                keyboardNavigation: true,
            },
            treeNodes: {
                Tables: {
                    text: 'Tables',
                    state: {
                        opened: true,
                    },
                    children: [],
                },
            } as TreeNodes,
        };
    },

    getters: {
        tableNames(state) {
            return state.tables.map((table) => table.name);
        },

        getTreeNodes(state) {
            state.tables.forEach((table) => {
                const tableColumns = Object.values(table.columns);

                state.treeNodes[table.name] = {
                    text: table.name,
                    children: Object.values(tableColumns).map(
                        (column) => `${table.name}_${column.name}`
                    ),
                };

                tableColumns.forEach((column) => {
                    state.treeNodes[`${table.name}_${column.name}`] = {
                        text: column.name,
                    };
                });
            });

            state.treeNodes.Tables.children = this.tableNames;

            return state.treeNodes;
        },
    },

    actions: {
        async loadDatabaseTables(): Promise<void> {
            const { data } = await axios.get('/api/schema/list');

            this.tables = data.data;
        },
        async loadDatabaseDetails(): Promise<void> {
            const { data } = await axios.get('/api/schema/details');

            this.schema = data.data;
        },
    },
});
