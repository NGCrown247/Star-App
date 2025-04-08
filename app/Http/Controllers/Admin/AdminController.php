<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

 class AdminController extends Controller
{

  //ADMIN GET ALL USERS
        public function userPage(){

          return  view('admin.users.list');
        }
        public function index(){

          $users = User::latest()->get();

          return response()->json(['users'=>$users]);
        }

        //ADMIN DASHBOARD
        public function dashboard(){

          if (Auth::check()) {
            // Add cache-control headers to prevent caching
            return response()->view('content.dashboard.dashboards-analytics')
                ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        }

        return redirect()->route('welcome');

        }

        public function store(AdminRegisterRequest $request)
        {
            $data=$request->validated();
            $data['access_code']='palmpoint';
            $data['password'] =Hash::make($request->password);
             $user=User::create($data);

             return response()->json(['users'=>User::all()],201);

        }



        public function update(Request $request, $id)
        {
            $data = $request->except(['password', 'created_at','updated_at']);

            if (!empty($request->password)) {
                $data['password'] = Hash::make($request->password);
            }

            User::where('id', $id)->update($data);

            return response()->json(['users' => User::all()], 200);
        }



        public function destroy( $id)
        {
            User::destroy($id);
            return response()->json(['users'=>User::all()],200);

        }

}
