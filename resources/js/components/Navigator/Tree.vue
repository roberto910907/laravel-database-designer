<template>
    <div class="relative flex">
        <!--        <Icon-->
        <!--            name="heroicons-outline:magnifying-glass"-->
        <!--            size="16"-->
        <!--            class="text-icon absolute top-4 left-2"-->
        <!--        ></Icon>-->
        <input
            v-model="search"
            type="text"
            placeholder="Search..."
            class="block w-full border-0 p-2.5 pl-8 text-xs"
        />
    </div>
    <TreeView
        :nodes="store.filteredTreeNodes"
        :config="store.treeConfig"
    ></TreeView>
</template>

<script setup>
import '@rober9109/vue-tree/dist/style.css';
import TreeView from '@rober9109/vue-tree';
import { storeToRefs } from 'pinia';
import { useDatabaseStore } from '@/stores/database.ts';

const store = useDatabaseStore();

const { search } = storeToRefs(store);

store.getTreeNodes();
</script>
