<template>
    <Admin sidebar-secondary>
        <template v-slot:sidebar-secondary-header>
            <div class="flex justify-between w-full">
                <span class="inline-block text-xl"> Seiten </span>
                <Button
                    square
                    secondary
                    @click="handleAddButtonClick()"
                    @keyup.esc="showCreateModal = false"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="-4.5 -4.5 24 24"
                        class="w-4 h-4 fill-white"
                    >
                        <path
                            d="M8.9 6.9v-5a1 1 0 1 0-2 0v5h-5a1 1 0 1 0 0 2h5v5a1 1 0 1 0 2 0v-5h5a1 1 0 1 0 0-2h-5z"
                        ></path>
                    </svg>
                </Button>
            </div>
        </template>
        <template v-slot:sidebar-secondary>
            <SitesList :list="list" />
        </template>
        <slot />
    </Admin>
</template>

<script setup lang="ts">
import { watch, ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Admin } from '@admin/layout';
// import { showCreateModal, Create } from './components/Create';
import SitesList from './components/SitesList.vue';
import { useList } from '@macramejs/macrame-vue3';
import { SidebarSecondary, Button } from '@macramejs/admin-vue3';

const props = defineProps({
    sites: {
        type: Array,
        required: true,
    },
});

type Site = {
    content: { [key: string]: any };
    id: number;
    name: string;
};

const items = ref(props.sites);

const list = useList<Site>([
    {
        children: [
            {
                children: [],
                value: {
                    content: {},
                    id: 3,
                    name: 'Bar',
                },
            },
        ],
        value: {
            content: {},
            id: 1,
            name: 'Home',
        },
    },
    {
        children: [],
        value: {
            content: {},
            id: 2,
            name: 'Foo',
        },
    },
]);

function handleAddButtonClick() {
    showCreateModal.value = !showCreateModal.value;

    list.push({
        content: {},
        id: 4,
        name: 'kik',
    });
}

watch(
    () => items.value,
    value => {
        Inertia.post('/admin/sites/sort', value as any);
    },
    { deep: true }
);
</script>
