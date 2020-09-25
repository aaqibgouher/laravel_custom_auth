<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\User;
use App\Utils\Common;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
        DB::beginTransaction();
    }

    public function login(Request $request){
        $data = [];
        $data["error"] = "";

        if($request->isMethod("post")){
            try{
                $request->flash();

                $validator = Validator::make($request->all(), [
                    "email" => "required|email|max:500",
                    "password" => "required",
                ]);
                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }

                $email = trim($request->input("email"));
                $password = trim($request->input("password"));

                $user = User::where("email", $email)->first();
                if(!$user) throw new Exception("Email does not exist.");
                if(!Hash::check($password, $user->password)) throw new Exception("Password is incorrect.");
                $user_id = $user->id;

                $user = User::find($user_id);
                $user_last_login_at = Common::now();
                $user->save();

                $token = Common::generate_token();

                session()->flush();
                session()->put("token", $token);

                $user_token = New UserToken();
                $user_token->user_id = $user_id;
                $user_token->token = $token;
                $user_token->save();

                DB::commit();

                return redirect()->route("home");
            }catch(Exception $e){
                DB::rollBack();
                $data["error"] = $e->getMessage();
            }
        }

        return view("auth.login", $data);
    }

    public function register(Request $request){
        $data = [];
        $data["error"] = "";

        if($request->isMethod("post")){
            try{
                $request->flash();

                $validator = Validator::make($request->all(), [
                    "first_name" => "required|max:100",
                    "last_name" => "required|max:100",
                    "email" => "required|email|max:500",
                    "password" => "required",
                    "password_confirm" => "required|same:password"
                ]);
                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }

                $first_name = trim($request->input("first_name"));
                $last_name = trim($request->input("last_name"));
                $email = trim($request->input("email"));
                $password = trim($request->input("password"));

                $user = User::where("email", $email)->first();
                if($user) throw new Exception("Email already exist.");

                $user = new User();
                $user->first_name = $first_name;
                $user->last_name = $last_name;
                $user->email = $email;
                $user->password = bcrypt($password);
                $user->save();

                $user_id = $user->id;
                $token = Common::generate_token();

                session()->flush();
                session()->put("token", $token);

                $user_token = New UserToken();
                $user_token->user_id = $user_id;
                $user_token->token = $token;
                $user_token->save();

                DB::commit();

                return redirect()->route("home");
            }catch(Exception $e){
                DB::rollBack();
                $data["error"] = $e->getMessage();
            }
        }

        return view("auth.register", $data);        
    }

    public function logout(){
        session()->flush();
        return redirect()->route("home");
    }
}
