<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewUserRegisteredEvent;
use App\User;
use Hash;
use App\Repository\UserRepositoryInterface;

use Collection;

class UserController extends Controller

{
   private $userRepository;
   public function __construct(UserRepositoryInterface $userRepository)
   {
       $this->userRepository = $userRepository;
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
}
