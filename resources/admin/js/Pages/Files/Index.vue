<template>
    <Admin sidebar-secondary>
        <template v-slot:sidebar-secondary-header>
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center space-x-3">
                    <svg
                        width="24"
                        height="24"
                        stroke-width="1"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M22 12.6v7.8a.6.6 0 0 1-.6.6h-7.8a.6.6 0 0 1-.6-.6v-7.8a.6.6 0 0 1 .6-.6h7.8a.6.6 0 0 1 .6.6ZM19.5 14.51l.01-.011"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="m13 18.2 3.5-1.2 5.5 2M2 10V3.6a.6.6 0 0 1 .6-.6h6.178a.6.6 0 0 1 .39.144l3.164 2.712a.6.6 0 0 0 .39.144H21.4a.6.6 0 0 1 .6.6V9M2 10v8.4a.6.6 0 0 0 .6.6H10m-8-9h8"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    <span class="inline-block text-xl"> Files </span>
                </div>
            </div>
        </template>
        <template v-slot:sidebar-secondary>
            <SidebarContent @update="setFilters" :collections="collections" />
        </template>
        <template v-slot:topbar-left> Topbar Left </template>
        <template v-slot:topbar-right>
            <ContextMenu placement="bottom" customButton>
                <template #button>
                    <Button v-if="selected.length > 0" secondary>
                        Edit Selection
                    </Button>
                </template>
                <div class="flex flex-col">
                    <button
                        class="w-full py-2.5 px-[14px] text-left hover:bg-white hover:bg-opacity-20 rounded-[8px]"
                    >
                        Edit
                    </button>
                    <button
                        class="w-full py-2.5 px-[14px] text-left hover:bg-white hover:bg-opacity-20 rounded-[8px]"
                    >
                        Duplicate
                    </button>
                    <div
                        class="bg-white w-full my-1.5 h-px bg-opacity-20"
                    ></div>
                    <button
                        class="w-full py-2.5 px-[14px] text-left hover:bg-white hover:bg-opacity-20 rounded-[8px]"
                    >
                        Archive
                    </button>
                    <button
                        class="w-full py-2.5 px-[14px] text-left hover:bg-white hover:bg-opacity-20 rounded-[8px]"
                    >
                        Move
                    </button>
                    <div
                        class="bg-white w-full my-1.5 h-px bg-opacity-20"
                    ></div>
                    <button
                        class="w-full flex items-center text-red-signal gap-2 py-2.5 px-[14px] text-left hover:bg-red-signal hover:bg-opacity-20 rounded-[8px]"
                    >
                        <svg
                            width="24"
                            height="24"
                            class="origin-left scale-75"
                            stroke-width="1.5"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M19 11v9.4a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V11M10 17v-6M14 17v-6M21 7h-5M3 7h5m0 0V3.6a.6.6 0 0 1 .6-.6h6.8a.6.6 0 0 1 .6.6V7M8 7h8"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <span>Delete</span>
                    </button>
                </div>
            </ContextMenu>
            <Button
                @click="openImageModal = true"
                v-if="requestUrl != '/admin/files'"
            >
                <div class="flex items-center gap-1">
                    <span>Add Files</span>
                </div>
            </Button>
            <Modal v-model:open="openImageModal">
                <div
                    class="flex items-center justify-between px-6 pb-6 mb-6 -mx-6 border-b border-gray-100"
                >
                    <div class="inline-flex items-center gap-1">
                        <svg
                            width="24"
                            height="24"
                            stroke-width="1"
                            class="origin-left scale-75"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M13 21H3.6a.6.6 0 0 1-.6-.6V3.6a.6.6 0 0 1 .6-.6h16.8a.6.6 0 0 1 .6.6V13"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="m3 16 7-3 5.5 2.5M16 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4ZM16 19h3m3 0h-3m0 0v-3m0 3v3"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <span class="text-xl">Add Images to Collection</span>
                    </div>
                    <div class="inline-flex items-center gap-2">
                        <Button @click="addFiles"> Add Files </Button>
                        <button
                            @click="openImageModal = false"
                            class="rounded-[8px] bg-gray-100 p-2 hover:bg-gray-200 focus:outline-none hover:scale-90 focus:ring-4 focus:ring-orange-100 transition duration-300"
                        >
                            <svg
                                width="24"
                                height="24"
                                stroke-width="1"
                                class="scale-80"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M6.758 17.243 12.001 12m5.243-5.243L12 12m0 0L6.758 6.757M12.001 12l5.243 5.243"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
                <ImageModalContent :url="requestUrl" v-model="selected" />
            </Modal>
        </template>
        <div class="flex flex-col w-full h-full px-6 py-8">
            <TabGroup :defaultIndex="1">
                <TabList class="flex justify-end w-full gap-2">
                    <Tab v-slot="{ selected }">
                        <button
                            class="p-1 transition-colors focus:outline-none focus:ring-4 focus:ring-orange-100 duration-300 rounded-[8px]"
                            :class="{
                                'bg-indigo-900 !text-white': selected,
                                'hover:bg-gray-200': !selected,
                            }"
                        >
                            <svg
                                width="24"
                                height="24"
                                stroke-width="1"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M8 6h12M4 6.01l.01-.011M4 12.01l.01-.011M4 18.01l.01-.011M8 12h12M8 18h12"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }">
                        <button
                            class="p-1 transition-colors focus:outline-none focus:ring-4 focus:ring-orange-100 duration-300 rounded-[8px]"
                            :class="{
                                'bg-indigo-900 !text-white': selected,
                                'hover:bg-gray-200': !selected,
                            }"
                        >
                            <svg
                                width="24"
                                height="24"
                                stroke-width="1"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M14 20.4v-5.8a.6.6 0 0 1 .6-.6h5.8a.6.6 0 0 1 .6.6v5.8a.6.6 0 0 1-.6.6h-5.8a.6.6 0 0 1-.6-.6ZM3 20.4v-5.8a.6.6 0 0 1 .6-.6h5.8a.6.6 0 0 1 .6.6v5.8a.6.6 0 0 1-.6.6H3.6a.6.6 0 0 1-.6-.6ZM14 9.4V3.6a.6.6 0 0 1 .6-.6h5.8a.6.6 0 0 1 .6.6v5.8a.6.6 0 0 1-.6.6h-5.8a.6.6 0 0 1-.6-.6ZM3 9.4V3.6a.6.6 0 0 1 .6-.6h5.8a.6.6 0 0 1 .6.6v5.8a.6.6 0 0 1-.6.6H3.6a.6.6 0 0 1-.6-.6Z"
                                    stroke="currentColor"
                                />
                            </svg>
                        </button>
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel>
                        <ListLayout :url="requestUrl" />
                    </TabPanel>
                    <TabPanel>
                        <GridLayout :url="requestUrl" v-model="selected" />
                    </TabPanel>
                </TabPanels>
            </TabGroup>
        </div>
    </Admin>
</template>

<script lang="ts" setup>
import { onBeforeMount, onMounted, ref, watch } from 'vue';
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
import { Button, ContextMenu, Modal } from '@macramejs/admin-vue3';
import { Admin } from '@admin/layout';
import SidebarContent from './components/SidebarContent.vue';
import GridLayout from './components/GridLayout.vue';
import ListLayout from './components/ListLayout.vue';
import ImageModalContent from './components/ImageModalContent.vue';
import { index } from './index';

const props = defineProps({
    collections: {
        type: Array,
        requried: true,
    },
});
const openImageModal = ref(false);
const selected = ref([]);
const requestUrl = ref(null);

const edit = () => {
    selected.value = [];
};

const setFilters = (value: string) => {
    if (value.includes('collection') && value.split('=')[1] != null) {
        requestUrl.value = '/admin/files?' + value;

        index.filters.collection = {
            value: value.split('=')[1],
        };
    }
    if (value.includes('collection') && value.split('=')[1] == '') {
        requestUrl.value = '/admin/files';
        index.filters.collection = {};
    }

    if (value.includes('type') && value.split('=')[1] != null) {
        index.filters.type = {
            value: value.split('=')[1],
        };
    }
    if (value.includes('type') && value.split('=')[1] == null) {
        index.filters.type = {};
    }
};

const addFiles = () => {
    console.log('TODO');
};

onBeforeMount(() => {
    requestUrl.value = '/admin/files';
});
</script>
