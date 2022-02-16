<template>
    <DefaultLayout>
        <template v-slot:sidebar-primary>
            <SidebarPrimary />
        </template>
        <template v-if="sidebarSecondary" v-slot:sidebar-secondary>
            <slot name="sidebar-secondary">
                <SidebarSecondary />
            </slot>
        </template>
        <template v-slot:topbar-left>
            <slot name="topbar-left" />
        </template>
        <template v-slot:topbar-right>
            <TopbarRight>
                <slot name="topbar-right" />
            </TopbarRight>
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
import TopbarRight from './TopbarRight.vue';

defineProps({
    sidebarSecondary: {
        type: Boolean,
        default: false,
    },
});
</script>
