<template>
    <PagesList :list="list" />
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import PagesList from './PagesList.vue';
import { useList, TList } from '@macramejs/macrame-vue3';
import { Page } from '@admin/modules/resources';

const props = defineProps({
    list: {
        type: Object as PropType<TList<Page>>,
        required: true,
    },
});
</script>
