<?php
namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Lijo API",
 *     version="1.0.0",
 *     description="API for discovering local food and onboarding restaurants."
 * )
 *
 * @OA\Server(
 *     url="http://localhost",
 *     description="Local Development Server"
 * )
 * @OA\Server(
 *     url="https://lijo.co.ls/api",
 *     description="Production Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="JWT Authorization header using the Bearer scheme. Example: 'Authorization: Bearer {token}'"
 * )
 *
 * @OA\Tag(
 *     name="Users",
 *     description="APIs related to user operations"
 * )
 *
 * @OA\Tag(
 *     name="Restaurants",
 *     description="APIs related to restaurant operations"
 * )
 *
 * @OA\Tag(
 *     name="Menus",
 *     description="APIs related to restaurant menus"
 * )
 *
 * @OA\Tag(
 *     name="Meals",
 *     description="APIs related to meal operations in menus"
 * )
 */
class ApiDocumentation
{
    /**
     * @OA\PathItem(
     *     path="/api/register",
     *     @OA\Post(
     *         summary="Register a new user",
     *         tags={"Users"},
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\JsonContent(
     *                 required={"name", "email", "password"},
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="password", type="string")
     *             )
     *         ),
     *         @OA\Response(
     *             response=201,
     *             description="User created successfully",
     *             @OA\JsonContent(
     *                 @OA\Property(property="user", type="object")
     *             )
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Invalid input"
     *         )
     *     )
     * )
     */
    public function register() {}

    /**
     * @OA\PathItem(
     *     path="/api/login",
     *     @OA\Post(
     *         summary="Login a user",
     *         tags={"Users"},
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\JsonContent(
     *                 required={"email", "password"},
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="password", type="string")
     *             )
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="Login successful",
     *             @OA\JsonContent(
     *                 @OA\Property(property="token", type="string")
     *             )
     *         ),
     *         @OA\Response(
     *             response=401,
     *             description="Invalid credentials"
     *         )
     *     )
     * )
     */
    public function login() {}

    /**
     * @OA\PathItem(
     *     path="/api/logout",
     *     @OA\Post(
     *         summary="Logout the user",
     *         tags={"Users"},
     *         @OA\Response(
     *             response=200,
     *             description="Logout successful",
     *             @OA\JsonContent(
     *                 @OA\Property(property="message", type="string", example="Successfully logged out")
     *             )
     *         )
     *     )
     * )
     */
    public function logout() {}

    /**
     * @OA\PathItem(
     *     path="/api/restaurants",
     *     @OA\Get(
     *         summary="Get a list of restaurants",
     *         tags={"Restaurants"},
     *         @OA\Response(
     *             response=200,
     *             description="List of restaurants",
     *             @OA\JsonContent(
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="name", type="string")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function getRestaurants() {}

    /**
     * @OA\PathItem(
     *     path="/api/menus/{restaurantId}",
     *     @OA\Get(
     *         summary="Get the menu for a specific restaurant",
     *         tags={"Menus"},
     *         @OA\Parameter(
     *             name="restaurantId",
     *             in="path",
     *             required=true,
     *             description="The ID of the restaurant",
     *             @OA\Schema(type="integer")
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="Menu for the restaurant",
     *             @OA\JsonContent(
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="name", type="string"),
     *                     @OA\Property(property="description", type="string"),
     *                     @OA\Property(property="price", type="number", format="float")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function getMenuForRestaurant() {}

    /**
     * @OA\PathItem(
     *     path="/api/meals",
     *     @OA\Get(
     *         summary="Get a list of meals",
     *         tags={"Meals"},
     *         @OA\Response(
     *             response=200,
     *             description="List of meals",
     *             @OA\JsonContent(
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="name", type="string"),
     *                     @OA\Property(property="description", type="string"),
     *                     @OA\Property(property="price", type="number", format="float")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function getMeals() {}

    /**
     * @OA\PathItem(
     *     path="/api/meals/{id}",
     *     @OA\Get(
     *         summary="Get a specific meal by ID",
     *         tags={"Meals"},
     *         @OA\Parameter(
     *             name="id",
     *             in="path",
     *             required=true,
     *             description="The ID of the meal",
     *             @OA\Schema(type="integer")
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="Details of the meal",
     *             @OA\JsonContent(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="price", type="number", format="float")
     *             )
     *         ),
     *         @OA\Response(
     *             response=404,
     *             description="Meal not found"
     *         )
     *     )
     * )
     */
    public function getMealById() {}
}
