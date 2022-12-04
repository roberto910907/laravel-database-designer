<template>
    <h3 v-for="table in tables" :key="table.name" class="text-gray-900">
        {{ table.name }}
    </h3>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

const tables = ref([]);

onMounted(async () => {
    await axios.get('/api/schema/list').then((response) => {
        tables.value = response.data;
        console.log(response.data);
        console.log(tables.value);
        console.log(tables);
    });
});
</script>
