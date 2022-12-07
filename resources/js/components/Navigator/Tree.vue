<template>
    <TreeView
        :nodes="getTreeNodes(tables)"
        :config="{
            roots: getTreeRoots(tables),
        }"
    ></TreeView>
</template>

<script setup>
import 'vue3-treeview/dist/style.css';
import TreeView from 'vue3-treeview';
import { defineProps } from 'vue';

const { tables } = defineProps({
    tables: Array,
});

function getTreeRoots(tables) {
    return tables.map((table) => table.name);
}

function getTreeNodes(tables) {
    const nodes = {};

    tables.forEach((table) => {
        const tableColumns = Object.values(table.columns);

        nodes[table.name] = {
            text: table.name,
            children: Object.values(tableColumns).map(
                (column) => `${table.name}_${column.name}`
            ),
        };

        tableColumns.forEach((column) => {
            nodes[`${table.name}_${column.name}`] = {
                text: column.name,
            };
        });
    });

    console.log(nodes);

    return nodes;
}
</script>
