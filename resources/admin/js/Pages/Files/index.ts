import { useIndex } from '@macramejs/macrame-vue3';

interface File {
    id: number;
    author: string;
    width: number;
    height: number;
    url: string;
    download_url: string;
}

export const table = useIndex<File>({
    route: '/admin/files/items',
    syncUrl: true,
    defaultPerPage: 30, // deprecated
    sortBy: [],
});
