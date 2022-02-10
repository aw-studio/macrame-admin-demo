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

export const route = ref('/admin/files/items')

export const table = useIndex<File>({
    route: route.value,
    syncUrl: true,
    defaultPerPage: 30, // deprecated
    sortBy: [],
});

export const fetchItems = async () => {
    try {
        const { data } = await axios.get('https://picsum.photos/v2/list?limit=10');
        return data;
    } catch (error) {
        console.log(error);
    }
};

watch(route, () => {
    console.log(route.value);
})
