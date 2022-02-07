<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SitesSidebarHeader />
        </template>
        <template v-slot:default>
            <SitesSidebarBody :list="list" />
        </template>
    </SidebarSecondary>
</template>

<script lang="ts" setup>
import { watch, PropType } from 'vue';
import { SidebarSecondary } from '@macramejs/admin-vue3';
import { useList, TList, RawListItem, RawList } from '@macramejs/macrame-vue3';
import SitesSidebarHeader from './SitesSidebarHeader.vue';
import SitesSidebarBody from './SitesSidebarBody.vue';
import { SiteList as RawSiteList, Site } from '@admin/modules/resources';
import { saveQueue } from '@admin/modules/save-queue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    sites: {
        type: Object as PropType<RawSiteList[]>,
        required: true,
    },
});

type SiteList = TList<Site>;

const list: SiteList = useList<Site>(props.sites);

function parseListOrder(list: SiteList) {
    let order = [];

    for (let i = 0; i < list.items.length; i++) {
        order.push({
            id: list.items[i].value.id,
            children: parseListOrder(list.items[i].children),
        });
    }

    return order;
}

watch(
    list,
    () => {
        const queueKey = `sites.order`;
        const order: any = parseListOrder(list);
        console.log({ order });

        saveQueue.add(queueKey, async () => {
            Inertia.post('/admin/sites/order', { order });
        });
    },
    { immediate: true, deep: true }
);

watch(
    () => props.sites,
    () => {
        list.setItems(props.sites);
    },
    { immediate: true, deep: true }
);
</script>
