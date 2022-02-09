<template>
    <Tr v-for="(file, trKey) in table.items" :key="`th-${trKey}`">
        <Td slim>
            <div class="h-[50px] w-[50px]">
                <img
                    v-if="file.url"
                    :src="file.url"
                    alt=""
                    class="object-contain w-full h-full"
                />
                <div
                    v-else
                    class="object-contain w-full h-full bg-gray-500"
                ></div>
            </div>
        </Td>
        <Td> {{ file.name }} </Td>
        <Td> {{ file.size }} </Td>
        <Td slim> {{ file.uploaded_at }} </Td>
        <Td class="flex justify-end">
            <FileMenu />
        </Td>
    </Tr>
</template>

<script setup lang="ts">
import { PropType } from 'vue';
import { Index } from '@macramejs/macrame-vue3';
import { Tr, Td } from '@macramejs/admin-vue3';
import FileMenu from '../FileMenu.vue';

interface File {
    id: number;
    name: string;
    uploaded_at: string;
    size: number;
    author: string;
    width: number;
    height: number;
    url: string;
    download_url: string;
}

defineProps({
    table: Object as PropType<Index<File>>,
});
</script>
