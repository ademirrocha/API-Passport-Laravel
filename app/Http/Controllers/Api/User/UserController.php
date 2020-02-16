<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $resquest, $userId){
    	$user = User::find($userId);

    	if($user){
    		return response()->json($user);
    	}

    	return response()->json(['message' => 'User not found'], 400);
    }

    public function auth(){
    	$user = Auth::user();

    	if($user){
    		return response()->json($user);
    	}

    	return response()->json(['message' => 'User not found!'], 404);
    }
}
