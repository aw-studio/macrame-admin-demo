<template>
    <Admin sidebar-secondary>
        <template v-slot:sidebar-secondary>
            <NavigationsSidebar />
        </template>
        <template v-slot:topbar-left>
            <slot name="topbar-left" />
        </template>
        <slot />
    </Admin>
</template>

<script setup lang="ts">
import { PropType } from 'vue';
import { Admin } from '@admin/layout';
import NavigationsSidebar from './components/NavigationsSidebar.vue';
import { NavItemTreeCollectionResource } from '@admin/modules/resources';

const props = defineProps({
    items: {
        type: Object as PropType<NavItemTreeCollectionResource>,
        required: true,
    },
});
</script>
