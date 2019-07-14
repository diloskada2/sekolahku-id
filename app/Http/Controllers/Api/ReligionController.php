<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Religion;

class ReligionController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'religion_name' => 'required|unique:religions,religion_name'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $religion = Religion::create($request->all());

            $response = [
                "success" => true,
                "data" => $religion
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
            $data = Religion::getData($request);

            // YANG INI PAKE ELOQUENT
            $data2 = Religion::all();

            $response = [
                "success" => true,
                "data" => $data,
                "data2" => $data2
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
                'id' => 'required|exists:religions,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = Religion::readData($request->id);

            // YANG INI PAKE ELOQUENT
            $data2 = Religion::where('id', $request->id)->first();

            $response = [
                "success" => true,
                "data" => $data,
                "data2" => $data2
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
                'id' => 'required|exists:religions,id',
                'religion_name' => 'required',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $religion = Religion::where('id', $request->id)->first();
            $religion->update($request->all());

            $response = [
                "success" => true,
                "data" => $religion
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
                'id' => 'required|exists:religions,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $religion = Religion::where('id', $request->id)->first();
            $religion->delete();

            $response = [
                "success" => true,
                "message" => "Religion deleted successfully"
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
