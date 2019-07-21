<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Canteen;

class CanteenController extends Controller
{
    public function create(request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'name'     => 'required',
                'owner'   => 'required',
            ]);

            // validator error handling
            if ($validator->fails()) {
                // validator error response
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                // validator error result
                return response()->json($response, 400);
            }

            // create data with eloquent
            $canteen = Canteen::create($request->all());

            // success response
            $response = [
                "success"   => true,
                "data"      => $canteen
            ];

            // result
            return response()->json($response, 200);

        } catch (\Exception $error) {
            // error response
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            // result
            return response()->json($response, 500);

        }
    }    

    public function list(request $request) {
        // error handling
        try {
            // get data with eloquent
            $canteen = Canteen::all();

            // success responce
            $response = [
                "success"   => true,
                "blog"      => $canteen
            ];

            // result
            return response()->json($response, 200);

        } catch (\Exception $error) {
            // error response
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            // result
            return response()->json($response, 500);
            
        }
    }

    function read(Request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:canteens,id'
            ]);

            // validator error handling
            if ($validator->fails()) {
                // validator error response
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                // validator error result
                return response()->json($response, 400);

            }

            // get data with eloquent
            $canteen = Canteen::where('id', $request->id)->first();

            // success response
            $response = [
                "success" => true,
                "blog" => $canteen,
            ];

            // success result
            return response()->json($response, 200);

        } catch (\Exception $error) {
            // error response
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            // error result
            return response()->json($response, 500);

        }
    }

    function update(Request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'id'    => 'required|exists:canteens,id',
                'name'  => 'required',
                'owner' => 'required',
            ]);

            // validator error handling
            if ($validator->fails()) {
                // validator error response
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                // validator error result
                return response()->json($response, 400);
            }

            // get data with eloquent
            $canteen = Canteen::where('id', $request->id)->first();

            // update data with eloquent
            $canteen->update($request->all());

            // success response
            $response = [
                "success" => true,
                "data" => $canteen
            ];

            // success response
            return response()->json($response, 200);
            
        } catch (\Exception $error) {
            // error response
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            // error result
            return response()->json($response, 500);
        }
    }

    function delete(Request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:canteens,id'
            ]);

            // validator error handling 
            if ($validator->fails()) {
                // validator error response
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                // validator error result
                return response()->json($response, 400);

            }

            // get data with eloquent
            $canteen = Canteen::where('id', $request->id)->first();

            // delete data with eloquent
            $canteen->delete();

            // success response
            $response = [
                "success" => true,
                "message" => "Blog deleted successfully"
            ];

            // success result
            return response()->json($response, 200);

        } catch (\Exception $error) {
            // error response
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            // error result
            return response()->json($response, 500);
        }
    }
}
