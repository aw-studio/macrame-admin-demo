<template>
    <div class="w-full mt-10">
        <div class="grid grid-cols-12 gap-5">
            <div
                class="flex justify-center col-span-full max-w-[210px] max-h-[210px] md:col-span-6 xl:col-span-3"
            >
                <FileUpload url="/api/media" />
            </div>
            <div
                v-for="file in files"
                class="flex items-center justify-center cursor-pointer col-span-full md:col-span-6 xl:col-span-3"
            >
                <label class="relative img-container h-fit">
                    <input
                        type="checkbox"
                        :id="file.id"
                        class="absolute opacity-0"
                        :value="file"
                        v-model="selected"
                    />
                    <div
                        class="absolute top-0 left-0 z-0 w-full h-full bg-indigo-900 border-[3px] border-transparent bg-opacity-0 hover:bg-opacity-80"
                    >
                        <span
                            class="absolute hidden text-base text-white top-2 left-4"
                            >{{ file.author }}
                        </span>
                        <button
                            class="absolute hidden bg-gray-200 right-4 p-0.5 z-10 rounded-[8px] bottom-2.5"
                        >
                            <svg
                                width="24"
                                height="24"
                                stroke-width="1.5"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M18 12.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM12 12.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM6 12.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"
                                    fill="currentColor"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </button>
                    </div>
                    <img
                        v-if="file.download_url"
                        class="object-contain w-full h-full"
                        :src="file.download_url"
                        :alt="file.author"
                    />
                </label>
            </div>
        </div>
        <pre>{{ selected }}</pre>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { FileUpload } from '@macramejs/admin-vue3';

const props = defineProps({
    files: {
        type: Array,
        required: true,
    },
});

const selected = ref([]);
</script>

<style scoped>
.tab-height {
    height: calc(100vh - 230px);
}

.img-container:hover button,
.img-container:hover span {
    display: block !important;
}
.img-container > input:checked + div {
    border-color: #fead5e !important;
}
</style>
