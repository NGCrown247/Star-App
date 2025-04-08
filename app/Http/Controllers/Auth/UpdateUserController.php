<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{

    public function update(UpdateUserRequest $request, $id)
    {
 
        $data=$request->except(['password','created_at','updated_at']);
        if(!empty($request->password)){
          $data['password']=Hash::make($request->password);
        }
        
      
       User::where('id',$id)->update($data);
       return redirect()->route('users.index');
    }


}
