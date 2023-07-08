<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Admin login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/admin/login",
     *     operationId="AdminLogin",
     *     tags={"Admin"},
     *     summary="Admin Login",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 required={"admin_email", "password"},
     *                 @OA\Property(property="admin_email", type="string", format="email", example="admin@example.com"),
     *                 @OA\Property(property="password", type="string", format="password", example="password")
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Login Success!"),
     *     @OA\Response(response="401", description="Invalid Credentials"),
     *     @OA\Response(response="422", description="Validation Error!"),
     * )
     */
    public function AdminLogin(Request $request)
    {
        // Validate data
        $data = Validator::make($request->all(), [
            'admin_email' => 'required|email|max:255',
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

        if (Auth::guard('admin')->attempt(['admin_email' => $request->admin_email, 'password' => $request->password])) {
            $admin = Auth::guard('admin')->user();
            $token = $admin->createToken('AdminAuthToken')->accessToken;
            return response()->json([
                'status' => 200,
                'message' => 'Login Success!',
                'data' => ['token' => $token, 'admin' => $admin]
            ], 200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorised'
            ], 401);
        }
    }
}
