<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Sesion;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Incorrect email or password'
            ], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
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

    public function getSession()
    {
        $user = auth()->user();
        $sesions = Sesion::getSession($user)->get();
        return response()->json($sesions);
    }

    public function createSession(Request $request)
    {
        $this->validate($request, [
            'clase_id' => 'required',
            'coach_nomina' => 'required',
        ]);
        $user = auth()->user();
        $clase = Clase::find($request->clase_id);
        $decrypted_coach_nomina = Crypt::decryptString($request->coach_nomina);
        if ($decrypted_coach_nomina == $clase->coach->coach_nomina) {
            $entry = DB::select(DB::raw("select * from clase_user cu where user_id = 2 and date (created_at) = current_date()"));
            if ($entry == null) {
                Sesion::create(['user_id' => $user->id, 'clase_id' => $request->clase_id,]);
                return response()->json([
                    'status' => 'ok',
                    'message' => 'Session registered successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cannot register more that one session a day'
                ], 405);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect coach id'
            ], 403);
        }
    }
}
