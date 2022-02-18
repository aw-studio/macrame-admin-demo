<template>
    <SidebarSecondary>
        <template v-slot:header>
            <NavigationsidebarHeader />
        </template>
        <template v-slot:default>
            <NavigationsSidebarBody />
        </template>
    </SidebarSecondary>
</template>

<script lang="ts" setup>
import { SidebarSecondary } from '@macramejs/admin-vue3';
import NavigationsSidebarHeader from './NavigationsSidebarHeader.vue';
import NavigationsSidebarBody from './NavigationsSidebarBody.vue';
</script>
