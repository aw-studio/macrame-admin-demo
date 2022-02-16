<template>
    <BaseLayout v-bind="$attrs">
        <FilesTabs :collection="collection.data" />
    </BaseLayout>
</template>

<script lang="ts" setup>
import BaseLayout from './Index.vue';
import FilesTabs from './components/FilesTabs.vue';
import { PropType } from 'vue';
import { FileCollectionResource } from '@admin/modules/resources';
import { index } from './modules';

const props = defineProps({
    collection: {
        type: Object as PropType<FileCollectionResource>,
        requried: true,
    },
});

index.filters.collection = { value: props.collection.data.key };
</script>
