<template>
    <List :list="list" :group="{ name: 'page-list' }">
        <template v-slot:default="{ item }">
            <Link
                class="flex-1 py-1 cursor-pointer"
                :href="`/admin/pages/${item.value.id}`"
            >
                {{ item.value.name }}
            </Link>

            <!-- <Dropdown /> -->
        </template>
        <template v-slot:disclosure="{ item }">
            <PagesList :list="item.children" />
        </template>
    </List>
</template>

<script setup lang="ts">
import { Page } from '@admin/modules/resources';
import { defineProps, PropType } from 'vue';
import { TList } from '@macramejs/macrame-vue3';
import { List } from '@macramejs/admin-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
// import Dropdown from './Dropdown.vue';
import PagesList from './PagesList.vue';

const props = defineProps({
    list: {
        type: Object as PropType<TList<Page>>,
        required: true,
    },
});
</script>
