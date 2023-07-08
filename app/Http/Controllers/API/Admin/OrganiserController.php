<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/admin/organisercreate",
     *     operationId="store",
     *     tags={"Admin"},
     *     summary="Admin Create Organiser",
     *     security={{"bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 required={"organiser_name","organiser_email", "organiser_description", "phoneno"},
     *                 @OA\Property(property="organiser_name", type="string", format="text", example="organiser"),
     *                 @OA\Property(property="organiser_email", type="string", format="email", example="organiser@example.com"),
     *                 @OA\Property(property="organiser_description", type="string", format="text", example="description"),
     *                 @OA\Property(property="phoneno", type="string", format="text", example="9876543210")
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Organiser Created!"),
     *     @OA\Response(response="401", description="Invalid Credentials"),
     *     @OA\Response(response="422", description="Validation Error!"),
     * )
     */
    public function store(Request $request)
    {
        // Validate data 
        $data = Validator::make(
            $request->all(),
            [
                'organiser_name' => 'required|min:3|max:255',
                'organiser_email' => 'required|email|max:255|unique:organisers',
                // 'password' => 'required|min:8|max:16',
                'organiser_description' => 'required|max:255',
                'phoneno' => 'required|numeric|regex:/^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$/',
            ],
            [
                'phoneno.regex' => 'Invalid phone format',
                'phoneno.numeric' => 'Phone number must be numeric',
                'phoneno.required' => 'Phone number is required',
            ]
        );

        // Check validation error
        if ($data->fails()) {
            $message = $data->errors()->first();
            return response()->json([
                'status' => 422,
                'message' => 'Validation Error!',
                'data' => ['error' => $message]
            ], 422);
        }

        // Store data in database
        $organiser = Organiser::create([
            'organiser_name' => $request->organiser_name,
            'organiser_email' => $request->organiser_email,
            // 'password' => Hash::make($request->password),
            'organiser_description' => $request->organiser_description,
            'phoneno' => $request->phoneno,
            // 'status' => 1,
        ]);

        // $maildata = ['name' => $request->organiser_name, 'email' => $request->organiser_email, 'password' => $request->password];
        // Run a queue job to send an email to organiser with password
        // OrganiserCreated::dispatch($maildata);

        return response()->json([
            'status' => 200,
            'message' => 'Organiser Created!',
            'data' => $organiser,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
