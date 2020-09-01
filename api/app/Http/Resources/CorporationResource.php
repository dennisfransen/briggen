<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "presentation_image_url" => $this->presentation_image_url,
            "star_value" => (float)$this->star_value,
            "vouchers" => $this->whenLoaded("vouchers"),
            "products" => ProductResource::collection($this->whenLoaded("products")),
        ];
    }
}
