<template>
    <div class="flex h-7 w-full bg-gray-300">
        <span
            class="mx-auto my-auto text-sm font-medium uppercase text-gray-800"
        >
            {{ title }}
        </span>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';

interface Props {
    title: string;
}

defineProps<Props>();
</script>
