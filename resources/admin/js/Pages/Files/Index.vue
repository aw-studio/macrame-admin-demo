<template>
    <Admin sidebar-secondary>
        <template v-slot:sidebar-secondary>
            <FilesSidebar :collections="collections.data" />
        </template>
        <template v-slot:topbar-left> Topbar Left </template>
        <template v-slot:topbar-right>
            <FilesTopbarRight />
        </template>
        <slot>
            <FilesTabs />
        </slot>
    </Admin>
</template>

<script lang="ts" setup>
import { onBeforeMount, onMounted, PropType, ref, watch } from 'vue';
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
import { Admin } from '@admin/layout';
import SidebarContent from './components/SidebarContent.vue';
import GridLayout from './components/GridLayout.vue';
import ListLayout from './components/FilesListTable.vue.vue';
import { index } from './modules';
import { FileCollectionCollectionResource } from '@admin/modules/resources';
import FilesSidebar from './components/FilesSidebar.vue';
import FilesTopbarRight from './components/FilesTopbarRight.vue';
import FilesTab from './components/FilesTab.vue';

const props = defineProps({
    collections: {
        type: Object as PropType<FileCollectionCollectionResource>,
        requried: true,
    },
});

index.loadItems();

const setFilters = (value: string) => {
    if (value.includes('collection')) {
        requestUrl.value = '/admin/files?' + value;

        index.filters.collection = {
            value: value.split('=')[1],
        };
    }

    if (value.includes('type')) {
        index.filters.type = {
            value: value.split('=')[1],
        };
    }
};
</script>
