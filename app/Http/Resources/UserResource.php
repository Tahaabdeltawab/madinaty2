<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\City;
use App\Models\Area;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->lang == 'ar'){
            $city_name = City::where('id' , $this->city_id)->value('name_ar');
            $area_name = Area::where('id' , $this->area_id)->value('name_ar');
        }else{
            $city_name = City::where('id' , $this->city_id)->value('name_en');  
            $area_name = Area::where('id' , $this->area_id)->value('name_en');
        }
        return [
            "id" => $this->id,
            "username" => $this->username,
            'email' => $this->email,
            "phone" => $this->phone,
            "city_id" => $this->city_id,
            "city_name" =>  $city_name,
            "area_id" => $this->area_id,
            "area_name" => $area_name,
            "token" => $this->userToken,
        ];
    }
}
