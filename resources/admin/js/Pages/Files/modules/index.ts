import { useIndex, Index } from '@macramejs/macrame-vue3';
import { File } from '@admin/modules/resources';
import { reactive, ref, watch } from 'vue'
import axios from 'axios'

export type FileIndex = Index<File>;

export const index = useIndex<File>({
    route: '/admin/files/items',
    syncUrl: true,
    sortBy: [],
});

index.reloadOnChange(index.filters);

export const selectedFiles = ref<File[]>([]);