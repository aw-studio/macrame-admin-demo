<template>
    <DefaultLayout>
        <template v-slot:sidebar-primary>
            <SidebarPrimary />
        </template>
        <template v-if="sidebarSecondary" v-slot:sidebar-secondary>
            <SidebarSecondary>
                <template v-slot:header>
                    <slot name="sidebar-secondary-header" />
                </template>
                <slot name="sidebar-secondary" />
            </SidebarSecondary>
        </template>
        <template v-slot:topbar-left>
            <slot name="topbar-left" />
        </template>
        <template v-slot:topbar-right>
            <slot name="topbar-right" />
        </template>
        <template v-slot:topbar-secondary>
            <slot name="topbar-secondary" />
        </template>
        <slot />
    </DefaultLayout>
</template>

<script setup lang="ts">
import { DefaultLayout, SidebarSecondary } from '@macramejs/admin-vue3';
import SidebarPrimary from './SidebarPrimary.vue';

defineProps({
    sidebarSecondary: {
        type: Boolean,
        default: false,
    },
});
</script>
