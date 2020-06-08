<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewUserRegisteredEvent;
use App\Notifications\SignupActivate;
use App\User;
use Hash;
use Str;
use App\Repository\UserRepositoryInterface;

use Collection;
use Illuminate\Validation\ValidationException;

class UserController extends Controller

{
   private $userRepository;
   public function __construct(UserRepositoryInterface $userRepository)
   {
       $this->userRepository = $userRepository;
   }


   public function getUser(Request $request){
       return $request->user();
   }

    public function store(Request $request){
         try {
             $user = [
             "name"=>$request->name,
             "password"=>$request->password, //User modelinde mutators özelliğiyle hashlendi
             "email"=>$request->email,
         ];
         $this->userRepository->createUser($user);
         return response()->json(["message"=>"Ok Başarılı"], 200);
         } catch (\Throwable $th) {
             return response()->json($th->getMessage());
         }
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'activation_token' => Str::random(60)
        ]);
        $user->save();
        $user->notify(new SignupActivate($user));
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }
}
