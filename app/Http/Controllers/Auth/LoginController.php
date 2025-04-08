<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
          // Check the user's role and redirect accordingly
          if (Auth::user()->role === 'admin') {
              return response()->json(['success' => true, 'redirect' => route('admin.dashboard')]);
          }

          if (Auth::user()->role === 'user') {
              return response()->json(['success' => true, 'redirect' => route('users.dashboard')]);
          }

          // Optional: handle roles that do not match either 'admin' or 'user'
          return response()->json(['success' => false, 'message' => 'Role not recognized']);
      }

      // Handle failed login
      return response()->json(['success' => false, 'message' => 'Invalid credentials']);
    }
}
