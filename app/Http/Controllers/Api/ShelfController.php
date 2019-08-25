<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shelf;

class ShelfController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'shelf_code' => 'required|unique:shelfs,shelf_code',
                'position' => 'required|unique:shelfs,position'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $shelf = ShelfCategory::create($request->all());

            $response = [
                "success" => true,
                "data" => $shelf
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
            $data = ShelfCategory::getData($request);

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
                'id' => 'required|exists:shelf,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = ShelfCategory::readData($request->id);

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
                'id' => 'required|exists:shelfs,id',
                'shelf_code' => 'required',
                'position' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $shelf = ShelfCategory::where('id', $request->id)->first();
            $shelf->update($request->all());

            $response = [
                "success" => true,
                "data" => $shelf
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
                'id' => 'required|exists:shelf,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $shelf = ShelfCategory::where('id', $request->id)->first();
            $shelf->delete();

            $response = [
                "success" => true,
                "message" => "deleted successfully"
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
