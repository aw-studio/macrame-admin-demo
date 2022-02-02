export type Resource<Model> = {data: Model};
export type CollectionResource<Model> = {data: Model[]};

export type DateTime = {
    readable_diff: string
}

export type State = {
    label: string,
    value: string,
}

export type DateTimeResource = Resource<DateTime>;
export type StateResource = Resource<State>;
export type StatesCollectionResource = CollectionResource<State>;