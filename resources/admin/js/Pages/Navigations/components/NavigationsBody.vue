<template>
    <div class="p-12">
        <h1 class="flex justify-between mb-4">
            <span>Items</span>
            <Button
                square
                secondary
                @click="isOpen = true"
                @keyup.esc="isOpen = false"
            >
                +
            </Button>
        </h1>
        <NavigationsTree :tree="tree" />
        <AddItemModal :open="isOpen" @close="isOpen = false" :type="type" />
    </div>
</template>

<script lang="ts" setup>
import { PropType, ref, watch } from 'vue';
import { NavItemTreeItem, NavItem } from '@admin/modules/resources';
import { useList, useOriginal } from '@macramejs/macrame-vue3';
import { Button } from '@macramejs/admin-vue3';
import { saveQueue } from '@admin/modules/save-queue';
import NavigationsTree from './NavigationsTree.vue';
import AddItemModal from './AddItemModal.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    type: {
        type: String,
        required: true,
    },
    items: {
        type: Array as PropType<NavItemTreeItem[]>,
        required: true,
    },
});

const tree = useList<NavItem>(props.items, {
    onOrderChange,
});
tree.updateOnChange(props.items);

let originalOrder = useOriginal(tree.getOrder());

const orderQueueKey = `navigations.${props.type}.order`;

function onOrderChange(order) {
    if (!originalOrder) return;
    if (originalOrder.matches(order)) {
        saveQueue.remove(orderQueueKey);
    } else {
        saveQueue.add(orderQueueKey, async () => {
            originalOrder.update(order);
            Inertia.post(`/admin/navigations/${props.type}/order`, { order });
        });
    }
}

const isOpen = ref<boolean>(false);
</script>
