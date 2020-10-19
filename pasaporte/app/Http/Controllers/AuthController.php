<?php

namespace App\Http\Controllers;

use App\Clase;

use App\Sesion;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'status' => 'invalid_credentials',
                'message' => 'Invalid email or password'
            ], 401);
        }
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function getSessions(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = auth()->user();
        $sesions = Sesion::getSesions($user)->get();
        return response()->json($sesions);
    }

    public function registerSession(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = auth()->user();
        $clase = Clase::find($request->clase_id);
        $decrypted_coach_nomina = Crypt::decryptString($request->coach_nomina);
        if ($decrypted_coach_nomina == $clase->coach->coach_nomina) {
            Sesion::create([
                'user_id' => $user->id,
                'clase_id' => $request->clase_id,
            ]);
            return response()->json([
                'status' => 'ok',
                'message' => 'Session registered successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect id'
            ], 401);
        }
    }
}
