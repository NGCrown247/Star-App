<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessCode;
use App\Models\Plan;
use Illuminate\Http\Request;

class PackageController extends Controller
{
      public function codeViewPage (){
            return view('admin.accessCode.list');
     }

      public function index(){
            $access_codes = AccessCode::with('plan')->get()->all();
            return response()->json(['codes'=>$access_codes]);
      }

//----------------------------------------------------------------------
      public function destroy( $id)
      {

        $code = AccessCode::findOrFail($id);

        if (!$code) {
            return response()->json(['message' => 'Code not found'], 404);
        }
          $code->delete();
          return response()->json(['message'=>'Code Deleted Successfully'],200);

      }



//-----------------------------------------------------------------
      public function generateAccessCode(Request $request){
            $request->validate([
                  'code_length' => 'integer|required',
                  'number_of_codes' => 'integer|required',
                  'plan_id' => 'integer|required'
            ]);

            $plan = Plan::find($request->plan_id);

            $firstLetter = strtoupper($plan->plan_title['0']);
            $lastLetter = strtoupper($plan->plan_title [strlen($plan->plan_title)-1]);
            $prefix = "$firstLetter$lastLetter"."-";


            for($i=0; $i<$request->number_of_codes; $i++){

                  $accessCode = $prefix. generateAccessCode($request->code_length);

                  while($this->codeExist($accessCode)){
                        $accessCode = $prefix. generateAccessCode($request->code_length);
                  }

                  AccessCode::create(
                    [
                      'code'=>$accessCode,
                      'plan_id'=>$request->plan_id,

                  ]);
            }

            return response()->json(["message"=>"Access codes generated successfully"]);
      }

//--------------------------------------------------------------

      public function codeExist($code){
       return AccessCode::where('code', $code)->exists();
      }
}
