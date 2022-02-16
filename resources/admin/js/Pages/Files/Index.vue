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
import { PropType } from 'vue';
import { Admin } from '@admin/layout';
import { index } from './modules';
import { FileCollectionCollectionResource } from '@admin/modules/resources';
import FilesSidebar from './components/FilesSidebar.vue';
import FilesTopbarRight from './components/FilesTopbarRight.vue';
import FilesTabs from './components/FilesTabs.vue';

const props = defineProps({
    collections: {
        type: Object as PropType<FileCollectionCollectionResource>,
        requried: true,
    },
});

index.loadItems();
</script>
