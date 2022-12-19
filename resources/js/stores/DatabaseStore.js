import axios from 'axios';
import { defineStore } from 'pinia';

export const useDatabaseStore = defineStore('databaseStore', {
    state: () => {
        return {
            tables: [],
            schema: [],
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
            },
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
        async loadDatabaseTables() {
            const response = await axios.get('/api/schema/list');

            this.tables = response.data.data;
        },
        async loadDatabaseDetails() {
            const response = await axios.get('/api/schema/details');

            this.schema = response.data.data;
        },
    },
});
