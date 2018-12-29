<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Mahasiswa;
use Validator;

class UserController extends Controller
{
    //
    public $success_status 	= 200;

    /**
	* login function
    */
    public function login()
    {
    	if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    		$user 				= Auth::user();
    		$success['token'] 	= $user->createToken('nApp')->accessToken;
    		// return response()->json(['success' => $success], $this->success_status);
            $mahasiswa          = Mahasiswa::all();
            return compact('mahasiswa');
    	}else {
    		return response()->json(['error' => 'Unautorised'], 401);
    	}
    }

    /**
	* register function
    */
    public function register(Request $request)
    {
    	$validator 	= Validator::make($request->all(), [
    		'name' 			=> 'required',
    		'email' 		=> 'required|email',
    		'password' 		=> 'required',
    		'c_password' 	=> 'required|same:password',
    	]);

    	if ($validator->fails()) {
    		return response()->json(['error' => $validator->errors()], 401);
    	}

    	$input 				= $request->all();
    	$input['password'] 	= bcrypt($input['password']);
    	$user 				= User::create($input);
    	$success['token'] 	= $user->createToken('nApp')->accessToken;
    	$success['name'] 	= $user->name;

    	// return response()->json(['success' => $success], $this->success_status);
    	echo "Sukses";
    }

    public function details()
    {
    	$user 	= Auth::user();
    	return response()->json(['success' => $user], $this->success_status);
    }
}
