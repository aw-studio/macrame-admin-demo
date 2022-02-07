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

export type Site = {
    content: { [key: string]: any };
    id: number;
    name: string;
};

export type SiteList = RawListItem<Site>;

export type DateTimeResource = Resource<DateTime>;

export type StateResource = Resource<State>;
export type StatesCollectionResource = CollectionResource<State>;

export type SiteResource = Resource<Site>;
export type SiteCollectionResource = CollectionResource<Site>;

export type SiteListResource = Resource<SiteList>;
export type SiteListCollectionResource = CollectionResource<SiteList>;