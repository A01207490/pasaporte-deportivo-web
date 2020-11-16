<?php

namespace App\Http\Controllers;

use App\Clase;
use Throwable;

use App\Sesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $sessions_count_max = 15;
        $this->validate($request, ['clase_id' => 'required', 'coach_nomina' => 'required']);
        $user = auth()->user();
        $clase = Clase::find($request->clase_id);
        $coach_nomina = $request->coach_nomina;
        if ($clase->clase_nombre == "Pista") {
            $sessions_count = Sesion::getSessionClassCount("Pista", $user->id);
            if ($sessions_count >= $sessions_count_max) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'cannot register more track sessions'
                ], 406);
            }
            return $this->insertSession($user->id, $clase->id);
        } else {
            $coach_nomina_decrypted = $this->decryptCoachNomina($coach_nomina);
            if ($coach_nomina_decrypted == $clase->coach->coach_nomina) {
                return $this->insertSession($user->id, $clase->id);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'incorrect coach id'
                ], 403);
            }
        }
    }

    public function insertSession(int $user_id, int $clase_id)
    {
        $hasInsertToday = DB::select(DB::raw("select * from clase_user cu where user_id = " . $user_id . " and date (created_at) = current_date()"));
        if ($hasInsertToday == null) {
            Sesion::create(['user_id' => $user_id, 'clase_id' => $clase_id,]);
            return response()->json([
                'status' => 'success',
                'message' => 'session registered successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'cannot register more than one session a day'
            ], 405);
        }
    }

    public function decryptCoachNomina(String $coach_nomina)
    {
        try {
            return Crypt::decryptString($coach_nomina);
        } catch (Throwable $e) {
            report($e);
            return null;
        }
    }
}
