<?php

namespace App\Http\Controllers\API\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Token;

class EventController extends Controller
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
     *     path="/api/organiser/apievent",
     *     operationId="organiserevent",
     *     tags={"Organiser"},
     *     summary="Organiser Create Event",
     *     security={{"bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                 required={"name", "description", "date", "starttime", "endtime", "price", "totalticket", "address", "city", "state", "pincode", "category", "image"},
     *                 @OA\Property(property="name", type="string", minLength=3, maxLength=255),
     *                 @OA\Property(property="description", type="string", maxLength=255),
     *                 @OA\Property(property="date", type="string", format="date", example="2023-06-30"),
     *                 @OA\Property(property="starttime", type="string", example="10:00"),
     *                 @OA\Property(property="endtime", type="string", example="17:00"),
     *                 @OA\Property(property="price", type="string"),
     *                 @OA\Property(property="totalticket", type="string"),
     *                 @OA\Property(property="address", type="string", maxLength=255),
     *                 @OA\Property(property="city", type="string", maxLength=255),
     *                 @OA\Property(property="state", type="string", maxLength=255),
     *                 @OA\Property(property="pincode", type="integer"),
     *                 @OA\Property(property="category", type="string", maxLength=255),
     *                 @OA\Property(property="image", type="string", format="binary"),
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
        // Check the request is not from admin token
        $org = Auth::guard('organiserapi')->user()->token();
        if ($org->name == 'AdminAuthToken') {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorize!',
            ], 401);
        }

        // Validate data
        $data = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|max:255',
                'description' => 'required|string|max:255',
                'date' => 'required|date|after:10 day|before:6 months',
                'starttime' => 'required|date_format:H:i',
                'endtime' => 'required|date_format:H:i|after:starttime',
                'price' => 'required',
                'totalticket' => 'required',
                'address' => 'required|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'pincode' => 'required|numeric',
                'category' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'starttime.date_format' => 'Invalid date format. Please enter date in 24 hours format.',
                'endtime.date_format' => 'Invalid date format. Please enter date in 24 hours format.',
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

        // Upload Image
        $file = $request->file('image');
        $filename = $file->hashName();

        // Store image with hash name to storage directory
        $image_path = $request->file('image')->storeAs('organiser/event', $filename, 'public');

        $organiser = Auth::user();

        // One to Many Polymorphic Relation 
        $event = $organiser->events()->create([
            'event_name' => $request->name,
            'event_description' => $request->description,
            'event_image' => $filename,
            'category_name' => $request->category,
            'start_time' => $request->starttime,
            'end_time' => $request->endtime,
            'event_date' => $request->date,
            'total_ticket' => $request->totalticket,
            'available_ticket' => $request->totalticket,
            'event_price' => $request->price,
            'event_address' => $request->address,
            'event_city' => $request->city,
            'event_state' => $request->state,
            'pincode' => $request->pincode,
            'status' => 1,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Event Created!',
            'data' => $event,
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
