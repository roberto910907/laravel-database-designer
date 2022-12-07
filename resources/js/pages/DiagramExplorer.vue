<template>
    <!-- Primary column -->
    <section
        class="flex h-full min-w-0 flex-1 flex-col overflow-y-auto lg:order-last"
    >
        <Designer :tables="tables"></Designer>
    </section>

    <!-- Secondary column (hidden on smaller screens) -->
    <aside class="hidden lg:order-first lg:block lg:flex-shrink-0">
        <div
            class="relative flex h-full w-96 flex-col overflow-y-auto border-r border-gray-200 bg-gray-100"
        >
            <Tree :tables="tables"></Tree>
        </div>
    </aside>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Designer from '@/components/Diagram/Designer.vue';
import Tree from '@/components/Navigator/Tree.vue';

const tables = ref([]);

onMounted(async () => {
    await axios.get('/api/schema/list').then((response) => {
        tables.value = response.data.data;
    });
});
</script>
