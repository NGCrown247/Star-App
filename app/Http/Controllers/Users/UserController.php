<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // public function loginForm()
    // {
    //     // Show login view if not authenticated


    // }






        public function dashboard(Request $request)
    {
        if (Auth::check()) {
            // Add cache-control headers to prevent caching
            return response()->view('users.dashboard')
                ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        }

        return redirect()->route('welcome');
    }





    public function notification()
    {
        return view('users.notification');
    }

    public function topEarners()
    {
        return view('users.top-earners');
    }

    public function playVideo()
    {
        return view('users.play-video');
    }


    public function playMusic()
    {
        return view('users.play-music');
    }


    public function customizeCashout()
    {
        return view('users.auth.customize-cashout');
    }


    public function accountDetails()
    {
        return view('users.auth.acct-d');
    }


    public function unauthorized()
    {
        return view('errors.unauthorized');
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */



    /**
     * Remove the specified resource from storage.
     */

}
