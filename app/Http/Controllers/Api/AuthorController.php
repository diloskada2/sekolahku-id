<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;

class AuthorCategoryController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'author_name' => 'required',
                'address' => 'required',
                'phone_number' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $author = AuthorCategory::create($request->all());

            $response = [
                "success" => true,
                "data" => $author
            ];

            return response()->json($response, 200);
        } catch (\Exception $error) {
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            return response()->json($response, 500);
        }
    }

    function list(Request $request) {
        try {
            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = AuthorCategory::getData($request);

            $response = [
                "success" => true,
                "data" => $data
            ];

            return response()->json($response, 200);
        } catch (\Exception $error) {
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            return response()->json($response, 500);
        }
    }

    function read(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:authors,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = AuthorCategory::readData($request->id);

            // YANG INI PAKE ELOQUENT
            // $data2 = Religion::where('id', $request->id)->first();

            $response = [
                "success" => true,
                "data" => $data
                // "data2" => $data2
            ];

            return response()->json($response, 200);
        } catch (\Exception $error) {
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            return response()->json($response, 500);
        }
    }

    function update(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:authors,id',
                'author_name' => 'required',
                'address' => 'required',
                'phone_number' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $author = AuthorCategory::where('id', $request->id)->first();
            $author->update($request->all());

            $response = [
                "success" => true,
                "data" => $author
            ];

            return response()->json($response, 200);
        } catch (\Exception $error) {
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            return response()->json($response, 500);
        }
    }

    function delete(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:authors,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $author = AuthorCategory::where('id', $request->id)->first();
            $author->delete();

            $response = [
                "success" => true,
                "message" => " deleted successfully"
            ];

            return response()->json($response, 200);
        } catch (\Exception $error) {
            $response = [
                "success" => false,
                "message" => $error->getMessage()
            ];

            return response()->json($response, 500);
        }
    }   
}
