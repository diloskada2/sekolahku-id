<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CriticismCategories;

class CriticismCategoriesController extends Controller
{
    public function create(request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'type'          => 'required',
                'description'   => 'required',
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
            $data = CriticismCategories::create($request->all());

            // success response
            $response = [
                "success"   => true,
                "data"      => $data
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
            $CriticismCategories = CriticismCategories::all();

            // success responce
            $response = [
                "success"               => true,
                "criticismcategories"   => $CriticismCategories
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
                'id' => 'required|exists:criticism_categories,id'
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
            $CriticismCategories = CriticismCategories::where('id', $request->id)->first();

            // success response
            $response = [
                "success"               => true,
                "criticism_categories"   => $CriticismCategories,
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
                'id'    => 'required|exists:criticism_categories,id',
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
            $CriticismCategories = CriticismCategories::where('id', $request->id)->first();

            // update data with eloquent
            $CriticismCategories->update($request->all());

            // success response
            $response = [
                "success"   => true,
                "data"      => $CriticismCategories
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
                'id' => 'required|exists:criticism_categories,id'
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
            $CriticismCategories = CriticismCategories::where('id', $request->id)->first();

            // delete data with eloquent
            $CriticismCategories->delete();

            // success response
            $response = [
                "success" => true,
                "message" => "Criticism deleted successfully"
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
