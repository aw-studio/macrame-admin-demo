<template>
    <div class="w-full mt-10">
        <div class="mb-8">
            <FileUpload inline :url="url" @success="index.reload()" />
        </div>
        <div>
            <Index :table="index">
                <Table :table="index">
                    <template v-slot:thead>
                        <FilesTableHead :table="index" />
                    </template>
                    <template v-slot:tbody>
                        <FilesTableBody :table="index" />
                    </template>
                </Table>
            </Index>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { FileUpload, Index, Table } from '@macramejs/admin-vue3';
import { index } from '../index';
import FilesTableBody from './FilesTable/FilesTableBody.vue';
import FilesTableHead from './FilesTable/FilesTableHead.vue';

const props = defineProps({
    url: {
        type: String,
        default: '/admin/files',
    },
});

index.loadItems();
index.reloadOnChange(index.filters);
</script>

<style scoped>
.tab-height {
    height: calc(100vh - 230px);
}
</style>
