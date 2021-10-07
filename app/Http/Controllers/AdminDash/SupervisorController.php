<?php

namespace App\Http\Controllers\AdminDash;

use App\Models\User;
use App\Models\Place;
use App\Models\Category;
use App\Models\City;
use App\Models\SubCategory;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Manage\BaseController;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sups'] = User::supervisor()->latest()->get();
        return view('supervisors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), User::rules());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            DB::beginTransaction();
            $add_user = User::create([
                'role' => 3,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone_user,
                'password' => bcrypt($request->password),
            ]);


            $add_setting = Setting::create([
                'language' => "en",
                'notification' => "on",
                'user_id' => $add_user->id,
            ]);

            DB::commit();

            return back()->with('success', __('success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sup_id)
    {
        $supervisor = User::where('id', $sup_id)->first();
        return view('supervisors.edit', compact('supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [

            'username'      => 'required|unique:users,username,' . $id,
            'phone'         => 'required|numeric|min:7|regex:/(0)[0-9]{9}/|unique:users,phone,' . $id,
            'email'         => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $id,
            'password'      => 'sometimes|nullable|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $request_data = $request->except(['password', 'password_confirmation', '_token']);

        if($request->password)
            $request_data['password'] = bcrypt($request->password);

            
        User::where('id', $id)->update($request_data);

        return redirect('admin/supervisors')->with('success', __('success'));
    }

    public function updateStatus(Request $request)
    {
        try{
            $sup = User::find($request->user_id);
            $sup->status = $request->status;
            $sup->save();
            return response()->json(['success'=> '1']);
        }catch(\Throwable $th){
            return response()->json(['success'=> '0']);
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function my_places()
    {
        
        $supervisor_places = User::find(\Auth::user()->id)->places;

        return view('supervisors.my_places', compact('supervisor_places'));
       
    }

    public function edit_my_place( Request $request, $place_id )
    {

        $place = Place::find($place_id);

        if($place->supervisor_id == \Auth::user()->id){

            $categories = category::all();
            $cities = City::all();
            $users = User::where('role', 2)->get();

            $place_category = SubCategory::where('id', $place->subCategory_id)->get('category_id')->first();
            $subCategories = SubCategory::where('category_id',$place_category['category_id'] )->get();

            $areas = Area::where('city_id', $place->city_id)->get();
    
    
            return view('supervisors.edit_my_place', compact('place', 'categories','place_category', 'subCategories', 'cities', 'areas', 'users'));
        
        }else{
            abort(403, 'غير مسموح');
        }

    }

    public function update_my_place(Request $request, $place_id)
    {
        $place = Place::where('id', $place_id);

        if($place->first()->supervisor_id == \Auth::user()->id){

            $data = $request->validate([

                'name_ar'                   => 'required',
                'name_en'                   => 'required',
                'description_ar'            => 'required',
                'description_en'            => 'required',
                'phone'                     => 'required',
                'subCategory_id'            => 'required|numeric',
                'city_id'                   => 'required|numeric',
                'area_id'                   => 'required|numeric',
                'Facebook'                  => 'sometimes|nullable',
                'Twitter'                   => 'sometimes|nullable',
                'Instagram'                 => 'sometimes|nullable',
                'user_id'                   => 'required|numeric'
    
            ]);
    
            if($request->image)
                $data['image'] = BaseController::saveImage("places", $request->file('image'));
    
            $updated = $place->update($data);
    
            if ($updated == true) {
    
                return redirect('admin/myplaces')->with('success', __('success'));
            
            } else {
                echo "<script>alert('يوجد خطأ حاول مره أخرى');"
                    . "window.location.replace('places')"
                    . "</script>";
            }
        }

        
    }
    public function destroy($id)
    {
        $places = Place::where('supervisor_id', $id)->get();

        foreach($places as $place){
            
            $place->supervisor_id = null;
            $place->save();

            
        }
        User::find($id)->delete();

        return redirect('admin/supervisors')->with('success', __('success'));

    }
}
