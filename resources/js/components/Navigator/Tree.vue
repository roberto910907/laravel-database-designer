<template>
    <TreeView :nodes="store.getTreeNodes" :config="store.treeConfig"></TreeView>
</template>

<script setup>
import '@rober9109/vue-tree/dist/style.css';
import TreeView from '@rober9109/vue-tree';
import { useDatabaseStore } from '@/stores/DatabaseStore';

const store = useDatabaseStore();
</script>
