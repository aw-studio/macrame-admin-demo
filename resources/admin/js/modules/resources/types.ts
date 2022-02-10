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
    id: number;
    name: string;
};

export type PageListItem = RawListItem<Page>;

export type DateTimeResource = Resource<DateTime>;

export type StateResource = Resource<State>;
export type StatesCollectionResource = CollectionResource<State>;

export type PageResource = Resource<Page>;
export type PageCollectionResource = CollectionResource<Page>;

export type PageListResource = Resource<PageListItem>;
export type PageListCollectionResource = CollectionResource<PageListItem>;