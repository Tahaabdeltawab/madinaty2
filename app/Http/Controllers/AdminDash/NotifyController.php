<?php

namespace App\Http\Controllers\AdminDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use carbon\carbon;
use App\Models\User;
use App\Models\Notification;

class NotifyController extends Controller
{
    use ApiResponseTrait;

    public function show_notifyPage(){
        return view('notify.show');
    }

    public function notify_user(Request $request){
        
        $firebase_token = User::where('id' , $request->user_id)->value('firebase_token');
        $title = $request->title;
        $body = $request->body;
        $image = $request->file('image') ? BaseController::saveImage("notify" , $request->file('image')) : NULL;
        $expire_date = $request->expire_date;

        $add =  new Notification;
        $add->title_ar = $title;
        $add->body_ar = $body;
        $add->image = $image;
        $add->expire_date = $expire_date;
        $add->save();

        BaseController::send_notification($firebase_token , $title, $body, $add->id, $request->user_id);

        echo "<script>alert('تم أرسال الرسالة بنجاح');"
                    . "window.location.replace('notify')"
                    . "</script>";
    }


    public function notify_alluser(Request $request){
        
        $firebase_token = User::where('role' , 2)->get();
        $title = $request->title;
        $body = $request->body;
        $image = $request->file('image') ? BaseController::saveImage("notify" , $request->file('image')) : NULL;
        $expire_date = $request->expire_date;

        $add =  new Notification;
        $add->title_ar = $title;
        $add->body_ar = $body;
        $add->image = $image;
        $add->expire_date = $expire_date;
        $add->save();

        foreach( $firebase_token as $each){
            BaseController::send_notification($each->firebase_token , $title, $body, $add->id, $each->id);
        }

        echo "<script>alert('تم أرسال الرسالة بنجاح');"
                    . "window.location.replace('notify')"
                    . "</script>";
    }

    public function notify_user_city(Request $request)
    {

        $firebase_token = User::where('role' , 2)->where('area_id' , $request->area_id)->get();
        $title = $request->title;
        $body = $request->body;
        $image = $request->file('image') ? BaseController::saveImage("notify" , $request->file('image')) : NULL;
        $expire_date = $request->expire_date;

        $add =  new Notification;
        $add->title_ar = $title;
        $add->body_ar = $body;
        $add->image = $image;
        $add->expire_date = $expire_date;
        $add->save();

        foreach( $firebase_token as $each){
            BaseController::send_notification($each->firebase_token , $title, $body, $add->id, $each->id);
        }
        echo "<script>alert('تم أرسال الرسالة بنجاح');"
                    . "window.location.replace('notify')"
                    . "</script>";
      
    }
    
    public function get_all_notification()
    {
        
        $notifications = Notification::orderBy('id', 'DESC')->get();

        return view('notify.notification', compact('notifications'));
    }

    public function destroy($id)
    {
        Notification::find($id)->delete();

        return back()->with('success', __('success'));
    }
}
