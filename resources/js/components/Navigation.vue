<template>
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
                <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
            </a>
        </div>
    </nav>
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

const sidebarNavigation = [
    { name: 'Database Manag', href: '#', icon: CircleStackIcon, current: true },
    { name: 'Archive', href: '#', icon: ArchiveBoxIcon, current: false },
    { name: 'Customers', href: '#', icon: UserCircleIcon, current: false },
    { name: 'Flagged', href: '#', icon: FlagIcon, current: false },
    { name: 'Spam', href: '#', icon: NoSymbolIcon, current: false },
    { name: 'Drafts', href: '#', icon: PencilSquareIcon, current: false },
];
</script>
