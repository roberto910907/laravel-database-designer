<template>
    <section class="flex h-full min-w-0 flex-1 flex-col overflow-y-auto">
        <PanelHeader title="Database Diagram" />
        <Designer />
    </section>

    <aside class="hidden lg:order-first lg:block lg:flex-shrink-0">
        <div
            class="relative flex h-full w-64 flex-col overflow-y-auto border-r border-gray-200 bg-gray-100"
        >
            <PanelHeader title="Database Explorer" />
            <TreeNavigator />
        </div>
    </aside>

    <div class="lg:order-last lg:block lg:flex-shrink-0">
        <div
            class="relative flex h-full w-64 flex-col overflow-y-auto border-r border-gray-200 bg-gray-100"
        >
            <PanelHeader title="Database Properties" />
        </div>
    </div>
</template>

<script setup>
import Designer from '@/components/Diagram/Designer.vue';
import TreeNavigator from '@/components/Navigator/Tree.vue';
import PanelHeader from '@/components/Panel/PanelHeader.vue';
import { useDatabaseStore } from '@/stores/database.ts';

const store = useDatabaseStore();

store.loadDatabaseInformation();
</script>
