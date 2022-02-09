<template>
    <div class="w-full mt-10">
        <div class="mb-8">
            <FileUpload inline url="/api/media" />
        </div>
        <div>
            <!-- TODO: comment in if files are coming via crud -->
            <!--<Index>
                <Table :table="table">
                    <template v-slot:thead>
                        <FilesTableHead :table="table" />
                    </template>
                    <template v-slot:tbody>
                        <FilesTableBody :table="table" />
                    </template>
                </Table>
            </Index>-->
            <pre>{{ table }}</pre>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { FileUpload, Index, Table } from '@macramejs/admin-vue3';
import { table } from '../index';
import FilesTableBody from './FilesTable/FilesTableBody.vue';
import FilesTableHead from './FilesTable/FilesTableHead.vue';

const props = defineProps({
    files: {
        type: Array,
        required: true,
    },
});
</script>

<style scoped>
.tab-height {
    height: calc(100vh - 230px);
}
</style>
