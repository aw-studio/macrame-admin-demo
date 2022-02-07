<?php

namespace Admin\Http\Resources;

use App\Models\Site;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Site
 */
class SiteListResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Site
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
