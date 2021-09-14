<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Place;
use App\Models\Category;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\PopularPlaceResource;

class HomeController extends Controller
{
    use ApiResponseTrait;

    public function Home(Request $request){
        $lang = $request->header('lang');
        $area_id = $request->area_id;

        if($request->has('area_id')){

            $subcategory =  SubCategory::select('id' , 'name_ar', 'name_en' , 'image')->get();

            $places = Place::select('id' , 'name_ar','name_en' , 'image')->where([['area_id' , $area_id],['popular_section' , 1]])->limit(6)->get();
        
            $subcategory_data = SubCategory::all();

        }else{

            $subcategory = SubCategory::select('id' , 'name_ar','name_en' , 'image')->get();

            $places = Place::select('id' ,'name_ar','name_en' , 'image')->where([['popular_section' , 1]])->limit(6)->get();
        
            $subcategory_data = SubCategory::all();
;
        }
        $all = [
            "Slider" => SliderResource::collection(Slider::all()),
            "all_category" => SubCategoryResource::collection($subcategory),
            "popular_section" => PopularPlaceResource::collection($places),
            "subcategory" => SubCategoryResource::collection($subcategory_data),
        ];
        return $this->apiResponseData(  $all , "Home data");

    }
}
