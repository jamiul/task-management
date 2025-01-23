<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    // Register a new user
    public function register(UserRequest $request): JsonResponse
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return response()->json($user, Response::HTTP_CREATED);
    }
}
