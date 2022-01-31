<template>
    <nav class="space-y-6 tracking-widest">
        <Link
            href="/admin/ships"
            class="flex hover:text-green"
            :class="{ 'text-green': page.includes('/admin/ships') }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="-2 -2 24 24"
                width="24"
                fill="currentColor"
                class="w-5 h-5 mr-4"
            >
                <path
                    d="M16.93 11.998A1 1 0 0 1 17 10h2a1 1 0 0 1 0 2h-.055a9.001 9.001 0 0 1-17.89 0H1a1 1 0 0 1 0-2h2a1 1 0 0 1 .07 1.998A7.005 7.005 0 0 0 9 17.929V7.874A4.002 4.002 0 0 1 10 0a4 4 0 0 1 1 7.874v10.055a7.005 7.005 0 0 0 5.93-5.931zM10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                ></path>
            </svg>
            Shiffe
        </Link>
        <Link
            href="/admin/components"
            class="flex hover:text-green"
            :class="{ 'text-green': page.includes('/admin/components') }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="-2 -2 24 24"
                width="24"
                fill="currentColor"
                class="w-5 h-5 mr-4"
            >
                <path
                    d="M16.93 11.998A1 1 0 0 1 17 10h2a1 1 0 0 1 0 2h-.055a9.001 9.001 0 0 1-17.89 0H1a1 1 0 0 1 0-2h2a1 1 0 0 1 .07 1.998A7.005 7.005 0 0 0 9 17.929V7.874A4.002 4.002 0 0 1 10 0a4 4 0 0 1 1 7.874v10.055a7.005 7.005 0 0 0 5.93-5.931zM10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                ></path>
            </svg>
            Komponenten
        </Link>
    </nav>
</template>

<script setup lang="ts">
import { PropType, computed } from 'vue';
import { TSidebar } from '@macramejs/admin-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import { usePage } from '@inertiajs/inertia-vue3';

defineProps({
    sidebar: Object as PropType<TSidebar>,
});

const page = computed(() => {
    return usePage().url.value;
});
</script>
