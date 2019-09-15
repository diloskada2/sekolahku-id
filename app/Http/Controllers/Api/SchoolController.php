<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;

class SchoolController extends Controller
{
    function create(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'school_history' => 'required',
                'school_address' => 'required',
                'school_phone_number' => 'required',
                'school_map_location' => 'required',
                'school_name' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $school = School::create($request->all());

            $response = [
                "success" => true,
                "message" => $school
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

    function list(Request $request)
    {
        try {
            $data = School::getData($request);


            $response = [
                "success" => true,
                "data" => $data,
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

    function read(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:schools,id'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = School::readData($request->id);
            $response = [
                "success" => true,
                "data" => $data,
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

    function update(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:schools,id',
                'school_history' => 'required',
                'school_address' => 'required',
                'school_phone_number' => 'required',
                'school_map_location' => 'required',
                'school_name' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $school = School::where('id', $request->id)->first();
            $school->update($request->all());

            $response = [
                "success" => true,
                "data" => $school
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

    public function delete(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $school = School::where('id', $request->id)->first();
            $school->delete();

            $response = [
                "success" => true,
                "message" => "school structures deleted successfully"
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
