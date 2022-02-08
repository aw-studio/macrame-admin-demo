<?php

namespace Macrame\Cms\Pages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Macrame\Cms\Pages\Contract\Page;

/**
 * @mixin Page
 */
class PageListResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Page
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request                                        $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'value'    => parent::toArray($request),
            'children' => static::collection($this->children->sortBy('order_column')),
        ];
    }
}
