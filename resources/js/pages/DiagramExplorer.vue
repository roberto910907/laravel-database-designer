<template>
    <section
        class="flex h-full min-w-0 flex-1 flex-col overflow-y-auto lg:order-last"
    >
        <Designer></Designer>
    </section>

    <aside class="hidden lg:order-first lg:block lg:flex-shrink-0">
        <div
            class="relative flex h-full w-96 flex-col overflow-y-auto border-r border-gray-200 bg-gray-100"
        >
            <TreeNavigator></TreeNavigator>
        </div>
    </aside>
</template>

<script setup>
import { useDatabaseStore } from '@/stores/DatabaseStore';
import Designer from '@/components/Diagram/Designer.vue';
import TreeNavigator from '@/components/Navigator/Tree.vue';

const store = useDatabaseStore();

store.loadDatabaseTables();
</script>
