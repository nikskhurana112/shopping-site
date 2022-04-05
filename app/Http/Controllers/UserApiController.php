<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    public function doregister(Request $req){
        $req->validate([
            "name" => "required|max:255",
            "email" => "required|max:60|unique:users,email|email",
            "mobile" => "required|max:10|unique:users,mobile",
            "password" => "required|max:15|min:4|confirmed"
        ]);
        try{

            $data = $req->all();
            $data["password"] = bcrypt($req->password);
            $user = User::create($data);
            return $user;
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function dologin(Request $req){
        $req->validate([
            "email" => "required|max:60|unique:users,email|email",
            "password" => "required|max:15|min:4|confirmed"
        ]);
        try{

            $user = Auth::attempt(["email" => $req->email, "password" => $req->password]);

            if($user != false){
                
                return $user;
            }
     
         }
         catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

