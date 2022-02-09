<template>
    <div class="w-full mt-10">
        <div class="grid grid-cols-12 gap-5">
            <div
                class="flex justify-center col-span-full md:col-span-6 xl:col-span-3"
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
                        class="absolute top-0 left-0 w-full cursor-pointer h-full bg-black border-[3px] border-transparent bg-opacity-0 hover:bg-opacity-80"
                    >
                        <div
                            class="absolute img-checkbox top-0 left-0 hidden items-center justify-center w-5 h-5 rounded-br-[6px] text-white bg-orange"
                        >
                            <svg
                                width="24"
                                height="24"
                                class="scale-75 -translate-x-[3px] -translate-y-px"
                                stroke-width="1"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="m5 13 4 4L19 7"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                        <span
                            class="absolute hidden text-base text-white top-2 right-4"
                            >{{ file.author }}
                        </span>
                        <div
                            class="absolute btn-wrapper hidden right-4 bottom-2.5"
                        >
                            <FileMenu />
                        </div>
                    </div>
                    <img
                        v-if="file.download_url"
                        class="z-0 object-contain w-full h-full"
                        :src="file.download_url"
                        :alt="file.author"
                    />
                </label>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref, toRef, toRefs, watch } from 'vue';
import { useDropzone } from 'vue3-dropzone';
import { FileUpload } from '@macramejs/admin-vue3';
import FileMenu from './FileMenu.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Array,
    },
    files: {
        type: Array,
        required: true,
    },
});

const test = () => {
    console.log('dragover');
};

const testValue = ref(false);

const selected = ref([]);
const { modelValue } = toRefs(props);

watch(modelValue, () => {
    selected.value = modelValue.value;
});

watch(selected, () => {
    emit('update:modelValue', selected.value);
});
</script>

<style scoped>
.tab-height {
    height: calc(100vh - 230px);
}

.img-container:hover .btn-wrapper,
.img-container:hover span {
    display: block !important;
}
.img-container > input:checked + div {
    border-color: #fead5e !important;
}
.img-container > input:checked + div > .img-checkbox {
    display: flex !important;
}
</style>
