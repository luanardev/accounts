<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\User;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', function (Request $request) {
    $user = User::create([
		'name' => $request->name,
		'email' => $request->email,
		'password' => bcrypt($request->password),
		'email_verified_at' => now()
	]);

	$user->assignRole(Role::STAFF);

	return $user;

});

Route::post('/account', function (Request $request) {
    $user = User::getByEmail($request->email);
	return $user;

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api', 'scope:view-user')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/logout', function (Request $request) {
    $user = $request->user();

    $accessToken = $user->token();

    $tokenRepository = app(TokenRepository::class);
    $refreshTokenRepository = app(RefreshTokenRepository::class);

    // Revoke an access token
    $tokenRepository->revokeAccessToken($accessToken->id);

    // Revoke all token's refresh tokens
    $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($accessToken->id);

    return response()->json([
        "message" => "Revoked"
    ]);

});
