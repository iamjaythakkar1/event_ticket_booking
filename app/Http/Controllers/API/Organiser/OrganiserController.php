<?php

namespace App\Http\Controllers\API\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class OrganiserController extends Controller
{
    /**
     * Organiser login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/organiser/login",
     *     operationId="OrganiserLogin",
     *     tags={"Organiser"},
     *     summary="Organiser Login",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 required={"organiser_email", "password"},
     *                 @OA\Property(property="organiser_email", type="string", format="email", example="organiser@example.com"),
     *                 @OA\Property(property="password", type="string", format="password", example="password")
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Login Success!"),
     *     @OA\Response(response="401", description="Invalid Credentials"),
     *     @OA\Response(response="422", description="Validation Error!"),
     * )
     */
    public function OrganiserLogin(Request $request)
    {
        // Validate data
        $data = Validator::make($request->all(), [
            'organiser_email' => 'required|email|max:255',
            'password' => 'required|min:8|max:16',
        ]);

        // Check validation error
        if ($data->fails()) {
            $message = $data->errors()->first();
            return response()->json([
                'status' => 422,
                'message' => 'Validation Error!',
                'data' => ['error' => $message]
            ], 422);
        }

        if (Auth::guard('organiser')->attempt(['organiser_email' => $request->organiser_email, 'password' => $request->password])) {
            $user = Auth::guard('organiser')->user();
            $token = $user->createToken('OrganiserAuthToken')->accessToken;
            return response()->json([
                'status' => 200,
                'message' => 'Login Success!',
                'data' => ['token' => $token, 'organiser' => $user]
            ], 200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorised'
            ], 401);
        }
    }
}
