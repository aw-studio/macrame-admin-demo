<template>
    <SidebarSecondary>
        <template v-slot:header>
            <PagesSidebarHeader />
        </template>
        <template v-slot:default>
            <PagesSidebarBody :list="list" />
        </template>
    </SidebarSecondary>
</template>

<script lang="ts" setup>
import { watch, PropType } from 'vue';
import { SidebarSecondary } from '@macramejs/admin-vue3';
import {
    useList,
    TList,
    RawListItem,
    RawList,
    useOriginal,
} from '@macramejs/macrame-vue3';
import PagesSidebarHeader from './PagesSidebarHeader.vue';
import PagesSidebarBody from './PagesSidebarBody.vue';
import { PageListItem, Page } from '@admin/modules/resources';
import { saveQueue } from '@admin/modules/save-queue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    pages: {
        type: Object as PropType<PageListItem[]>,
        required: true,
    },
});

type PageList = TList<Page>;

const list: PageList = useList<Page>(props.pages);

list.updateOnChange(props.pages);

const queueKey = `pages.order`;
let originalOrder = useOriginal(list.getOrder());

watch(
    list,
    () => {
        const order = list.getOrder();

        if (originalOrder.matches(order)) {
            saveQueue.remove(queueKey);
        } else {
            saveQueue.add(queueKey, async () => {
                originalOrder.update(order);
                Inertia.post('/admin/pages/order', { order });
            });
        }
    },
    { immediate: true, deep: true }
);
</script>
