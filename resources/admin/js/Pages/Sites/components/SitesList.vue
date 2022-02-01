<template>
    <List :list="list" :group="{ name: 'pages-list' }">
        <template v-slot:default="{ item }">
            <Link
                class="flex-1 py-1 cursor-pointer"
                :href="`/admin/sites/${item.value.id}`"
            >
                {{ item.value.name }}
            </Link>

            <!-- <Dropdown /> -->
        </template>
        <template v-slot:disclosure="{ item }">
            <SitesList :list="item.children" />
        </template>
    </List>
</template>

<script setup lang="ts">
import { TList } from '@admin/modules/list';
import { defineProps, PropType } from 'vue';
import { List } from '@macramejs/admin-vue3';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { Link } from '@inertiajs/inertia-vue3';
// import Dropdown from './Dropdown.vue';
import SitesList from './SitesList.vue';

const props = defineProps({
    list: {
        type: Object as PropType<TList>,
        required: true,
    },
});
</script>
