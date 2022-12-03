<template>
    <div class="flex h-full flex-col">
        <Header></Header>

        <!-- Bottom section -->
        <div class="flex min-h-0 flex-1 overflow-hidden">
            <!-- Narrow sidebar-->
            <nav
                aria-label="Sidebar"
                class="hidden md:block md:flex-shrink-0 md:overflow-y-auto md:bg-gray-800"
            >
                <div class="relative flex w-20 flex-col space-y-3 p-3">
                    <a
                        v-for="item in sidebarNavigation"
                        :key="item.name"
                        :href="item.href"
                        :class="[
                            item.current
                                ? 'bg-gray-900 text-white'
                                : 'text-gray-400 hover:bg-gray-700',
                            'inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg',
                        ]"
                    >
                        <span class="sr-only">{{ item.name }}</span>
                        <component
                            :is="item.icon"
                            class="h-6 w-6"
                            aria-hidden="true"
                        />
                    </a>
                </div>
            </nav>

            <!-- Main area -->
            <main class="min-w-0 flex-1 border-t border-gray-200 lg:flex">
                <!-- Primary column -->
                <section
                    aria-labelledby="primary-heading"
                    class="flex h-full min-w-0 flex-1 flex-col overflow-y-auto lg:order-last"
                >
                    <h1 id="primary-heading" class="sr-only">Home</h1>
                    <!-- Your content -->
                </section>

                <!-- Secondary column (hidden on smaller screens) -->
                <aside class="hidden lg:order-first lg:block lg:flex-shrink-0">
                    <div
                        class="relative flex h-full w-96 flex-col overflow-y-auto border-r border-gray-200 bg-gray-100"
                    >
                        <!-- Your content -->
                    </div>
                </aside>
            </main>
        </div>
    </div>
</template>

<script setup>
import {
    ArchiveBoxIcon,
    FlagIcon,
    NoSymbolIcon,
    PencilSquareIcon,
    UserCircleIcon,
    CircleStackIcon,
} from '@heroicons/vue/24/outline';
import Header from '@/components/Header.vue';

const sidebarNavigation = [
    { name: 'Database Manag', href: '#', icon: CircleStackIcon, current: true },
    { name: 'Archive', href: '#', icon: ArchiveBoxIcon, current: false },
    { name: 'Customers', href: '#', icon: UserCircleIcon, current: false },
    { name: 'Flagged', href: '#', icon: FlagIcon, current: false },
    { name: 'Spam', href: '#', icon: NoSymbolIcon, current: false },
    { name: 'Drafts', href: '#', icon: PencilSquareIcon, current: false },
];
</script>
