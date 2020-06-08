<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repository\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use Hash;

class AuthController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request){
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = new UserResource($this->userRepository->findByEmail($request->email));
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Girilen bilgilerle eşleşen kayıt bulunamadı.'],
                ]);
            }
            return $user->createToken("browser")->accessToken;
        } catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
