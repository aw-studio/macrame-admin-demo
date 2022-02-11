import { useIndex } from '@macramejs/macrame-vue3';
import { ref, watch } from 'vue'
import axios from 'axios'

interface File {
    id: number;
    uuid: string;
    display_name: string;
    disk: string;
    filepath: string;
    filename: string;
    mimetype: string;
    size: number;
    meta: object;
    created_at: string;
    updated_at: string;
}


export const index = useIndex<File>({
    route: '/admin/files/items',
    syncUrl: true,
    sortBy: [],
});

