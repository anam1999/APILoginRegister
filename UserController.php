<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function register(Request $request){
    	  $user = new User;
    	  $user->username =$request->username;
    	  $user->password =$request->password;
    	  $user->save();

    	  $sukses ='berhasil';

    	  if ($user) {

    	  	return ($sukses);
    	  	# code...
    	  }

    }

    public function login(Request $request){
    	$username =$request->input('username');
    	$password = $request->input('password');

    	
    		if ($login=User::where('username',$username)->where('password',$password)->first()) 
    			# code...
    		{

    		$result["id"]= $login->id;
    		$result["username"] = $login->username;
    		return response()->json($result);
    	}else{
    		$result["pesan"] = "error";
    		return response()->json($result);
    	}
    }

}
