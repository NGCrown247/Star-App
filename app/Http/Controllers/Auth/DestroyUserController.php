<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyUserController extends Controller
{
  

    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(['message'=>'User deleted successfully']);  
    }
}
