import { RawListItem } from "@macramejs/macrame-vue3";

export type Resource<Model> = {data: Model};
export type CollectionResource<Model> = {data: Model[]};

export type DateTime = {
    readable_diff: string
}

export type State = {
    label: string,
    value: string,
}

export type Page = {
    content: { [key: string]: any };
    id?: number;
    name: string;
};

export type File = {
    id?: number,
    display_name: string,
    group: string,
    disk: string,
    filepath: string,
    filename: string,
    mimetype: string,
    size: number,
}

export type FileCollection = {
    id?: number,
    title: string,
    key?: string,
}

export type NavItem = {
    id?: number,
    title: string,   
    route: string,   
    parent_id: number,
    children: NavItem[],
}

export type NavItemTreeItem = RawListItem<NavItem>;

export type PageListItem = RawListItem<Page>;

export type DateTimeResource = Resource<DateTime>;

export type StateResource = Resource<State>;
export type StatesCollectionResource = CollectionResource<State>;

export type PageResource = Resource<Page>;
export type PageCollectionResource = CollectionResource<Page>;

export type PageListResource = Resource<PageListItem>;
export type PageListCollectionResource = CollectionResource<PageListItem>;

export type NavItemTreeResource = Resource<NavItemTreeItem>;
export type NavItemTreeCollectionResource = CollectionResource<NavItemTreeItem>;

export type FileCollectionResource = Resource<FileCollection>;
export type FileCollectionCollectionResource = CollectionResource<FileCollection>;

export type FileResource = Resource<File>;
export type FilesResource = CollectionResource<File>;