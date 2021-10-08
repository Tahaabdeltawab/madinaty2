<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Carbon ::setLocale( 'ar' );
        $date = new Carbon($this->created_at);
        return [
            "id" => $this->id,
            "name_en" => $this->name_en,
            "name_ar" => $this->name_ar,
            "image" => BaseController::getImageUrl("products" , $this->image),
            "description_en" => $this->description_en,
            "description_ar" => $this->description_ar,
            "price" => (float)$this->price,
            "created_at" => $date->diffForHumans()

        ];
    }
}
