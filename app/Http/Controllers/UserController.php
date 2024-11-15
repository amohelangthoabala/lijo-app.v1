<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

/**
 * @OA\Info(
 *     title="Lijo API",
 *     version="1.0.0",
 *     description="API documentation for Lijo"
 * )
 */
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register a new user",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|digits_between:7,15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $this->userService->register($data);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $response = $this->userService->login($data);

        if (!$response) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json($response); // Directly return the response from the service
    }

    public function logout(Request $request)
    {
        $this->userService->logout($request->user());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
