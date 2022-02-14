<template>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <button
            v-if="typeName"
            @click="typeName = null"
            class="px-4 py-2 rounded-[8px] w-full text-red-signal transition-colors text-left duration-300 hover:bg-red-100"
        >
            <div class="flex items-center justify-between">
                <span>Reset Filter</span>
                <svg
                    width="24"
                    height="24"
                    stroke-width="1"
                    class="origin-right scale-80 translate-x-[6px]"
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
            </div>
        </button>
        <RadioGroup v-model="typeName">
            <RadioGroupOption v-slot="{ checked }" value="images">
                <button
                    :class="checked ? 'bg-gray-100' : ''"
                    class="px-4 py-2 mb-1 rounded-[8px] transition-colors w-full text-left duration-300 hover:bg-gray-100"
                >
                    Images
                </button>
            </RadioGroupOption>
            <RadioGroupOption v-slot="{ checked }" value="documents">
                <button
                    :class="checked ? 'bg-gray-100' : ''"
                    class="px-4 py-2 mb-1 rounded-[8px] transition-colors w-full text-left duration-300 hover:bg-gray-100"
                >
                    Document
                </button>
            </RadioGroupOption>
        </RadioGroup>
    </div>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <div class="flex flex-col px-5 -mx-2">
            <div class="flex items-center gap-3 pt-16 pb-6">
                <svg
                    width="24"
                    stroke-width="1"
                    height="24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M5 19.5V5a2 2 0 0 1 2-2h11.4a.6.6 0 0 1 .6.6V21M9 7h6M6.5 15H19M6.5 18H19M6.5 21H19"
                        stroke="currentColor"
                        stroke-linecap="round"
                    />
                    <path
                        d="M6.5 18c-1 0-1.5-.672-1.5-1.5S5.5 15 6.5 15M6.5 21c-1 0-1.5-.672-1.5-1.5S5.5 18 6.5 18"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
                <span class="inline-block text-xl"> Collections </span>
                <button
                    class="inline-flex items-center justify-center ml-auto text-white rounded-full h-9 w-9 bg-gradient-to-r from-indigo-900 focus:outline-none focus:ring-4 focus:ring-orange-100 active:from-indigo-500 active:to-indigo-500 to-indigo-900 hover:from-gradient-red-500 hover:to-gradient-orange-500"
                    @click="showNewCollection = !showNewCollection"
                >
                    <svg
                        width="24"
                        height="24"
                        stroke-width="1"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M6 12h6m6 0h-6m0 0V6m0 6v6"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </button>
            </div>
            <div class="mb-4" v-if="showNewCollection">
                <Input
                    v-model="form.name"
                    @keyup.enter="submit"
                    label="Collection"
                />
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <!--<button
            v-for="collection in collections"
            @click="emit('update', `collection=${collection.key}`)"
        >
            <div class="flex justify-between">
                {{ collection.name }}
                <span class="text-gray-300"> {{ collection.files_count }}</span>
            </div>
        </button>-->
        <button
            v-if="collectionName"
            @click="collectionName = null"
            class="px-4 py-2 rounded-[8px] w-full text-red-signal transition-colors text-left duration-300 hover:bg-red-100"
        >
            <div class="flex items-center justify-between">
                <span>Reset Filter</span>
                <svg
                    width="24"
                    height="24"
                    stroke-width="1"
                    class="origin-right scale-80 translate-x-[6px]"
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
            </div>
        </button>
        <RadioGroup v-model="collectionName">
            <RadioGroupOption
                v-for="collection in collections"
                v-slot="{ checked }"
                :value="collection.key"
            >
                <button
                    :class="checked ? 'bg-gray-100' : ''"
                    class="px-4 py-2 mb-1 rounded-[8px] w-full transition-colors text-left duration-300 hover:bg-gray-100"
                >
                    <div class="flex justify-between">
                        {{ collection.name }}
                        <span class="text-gray-300">
                            {{ collection.files_count }}</span
                        >
                    </div>
                </button>
            </RadioGroupOption>
        </RadioGroup>
    </div>
</template>

<script lang="ts" setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { Input } from '@macramejs/admin-vue3';
import { RadioGroup, RadioGroupOption } from '@headlessui/vue';
import { ref, watch } from 'vue';
const emit = defineEmits(['update']);
const props = defineProps({
    collections: {
        type: Array,
        required: true,
    },
});
const updateUrl = url => {};

const showNewCollection = ref(false);

const collectionName = ref(null);
const typeName = ref(null);

const form = useForm({
    name: null,
});

const submit = () => {
    form.submit('post', '/admin/filecollections/store');
    form.reset();
    showNewCollection.value = false;
};

watch(collectionName, () => {
    if (!collectionName.value) {
        emit('update', 'collection=');
        return;
    }
    emit('update', `collection=${collectionName.value}`);
});
watch(typeName, () => {
    if (!typeName.value) {
        emit('update', 'type=');
        return;
    }
    emit('update', `type=${typeName.value}`);
});
</script>
