<template>
    <SitesList :list="list" />
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import SitesList from './SitesList.vue';
import { useList, TList } from '@macramejs/macrame-vue3';
import { Site } from '@admin/modules/resources';

const props = defineProps({
    list: {
        type: Object as PropType<TList<Site>>,
        required: true,
    },
});
</script>
