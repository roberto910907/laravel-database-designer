<template>
    <Header></Header>

    <div class="flex min-h-0 flex-1 overflow-hidden">
        <Navigation></Navigation>

        <main class="min-w-0 flex-1 border-t border-gray-200 lg:flex">
            <router-view></router-view>
        </main>
    </div>
</template>

<script setup>
import Header from '@/components/Header.vue';
import Navigation from '@/components/Navigation.vue';
</script>
