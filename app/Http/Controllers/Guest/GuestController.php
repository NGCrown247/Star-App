<?php

namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PostPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome()
    {
        $plans = Plan::all();


        if (Auth::check()) {
          // if (Auth::user()->role === 'user') {
          //     return redirect()->route('users.dashboard'); // Redirect to user dashboard
          // }
          if (Auth::user()->role === 'admin') {
              return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
          }
      }

        return view('welcome', ['plans'=>$plans]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function plansCheckOut()
    {
        return view('layouts.plans-checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contactUs()
    {
        return view('layouts.contact-section');
    }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
