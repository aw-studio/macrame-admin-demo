<template>
    <Admin sidebar-secondary>
        <template v-slot:sidebar-secondary>
            <SitesSidebar :sites="sites.data" />
        </template>
        <template v-slot:topbar-left>
            <slot name="topbar-left" />
        </template>
        <slot />
    </Admin>
</template>

<script setup lang="ts">
import { watch, ref, PropType } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Admin } from '@admin/layout';
// import { showCreateModal, Create } from './components/Create';
import SitesSidebar from './components/SitesSidebar.vue';
import { SidebarSecondary, Button } from '@macramejs/admin-vue3';
import { SiteListCollectionResource } from '@admin/modules/resources';

const props = defineProps({
    sites: {
        type: Object as PropType<SiteListCollectionResource>,
        required: true,
    },
});
</script>
