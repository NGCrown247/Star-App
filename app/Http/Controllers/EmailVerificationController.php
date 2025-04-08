<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Notifications\SendCodeNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{


    // public function showEmailForm(){
    //     return view("EmailForm");
    // }


      public function sendVerificationCode(Request $request){
        $data =$request->validate([
                'email'=>'required|email',
                'plan_id'=>'required|integer'
            ]);

           // $data = $request->validated();

            $code = generateAccessCode(6);
            $data['token'] = $code;
            $data['code_expired_at'] =now()->addMinutes(15);



            $data['url'] = $request->getSchemeAndHttpHost();




           Notification::route('mail', $data['email'])->notify(new SendCodeNotification($data));


              EmailVerification::create($data);

    }


// CODE VERIFICATION HERE
    public function verifyEmail(Request $request){
            $request->validate([
                'email'=>'required|email',
                'token'=>'required|string',
                'plan_id'=>"required|integer"
            ]);

            if(empty($request->token)){
              return response()->json(["error" => "Token field is required"], 400);

            }

            $result = EmailVerification::where([
              ['email',$request->email],
              ['token',$request->token],
              ['plan_id',$request->plan_id],
              ['is_verified',false]])
              ->first();
            if(empty($result)){
                //  return back()->withErrors("Invalid token or email");
                return response()->json(["message"=>"Invalid token or email"],402);

            }


            if(now()->diffInMinutes($result->created_at) > 15){
        return response()->json(["message"=>"Sorry! this code has expired"],401);
            }

        $result->is_verified=true;
        $result->token=null;
        $result->save();
        return response()->json(["message"=>"Verified successfully"], 201);
    }


}
