<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\AccessCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function store(RegisterRequest $request)
     {
         $validatedData = $request->validated();

          if (User::where('email', $validatedData['email'])->exists()) {
            return response()->json([
              'errors' => ['email' => ['Email already exists.']]
          ], 422);

        }else if (AccessCode::where('code', $validatedData['access_code'])->doesntExist()) {
          return response()->json([
            'errors' => ['access_code' => ['Invalid or Used Access Code.']]
        ], 422);

      }


         $validatedData['password'] = Hash::make($validatedData['password']);
         $validatedData['role'] = 'user';

         $user = User::create($validatedData);

         return response()->json(['message' => 'User registered successfully!', 'user' => $user], 201);
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
