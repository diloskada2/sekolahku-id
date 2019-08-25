<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SchoolStructures;

class SchoolStructuresController extends Controller
{
    function create(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'structure_name' => 'required',
                'structure_pic' => 'required',
                'school_id' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $school_structures = SchoolStructures::create($request->all());

            $response = [
                "success" => true,
                "message" => $school_structures
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
            $data = SchoolStructures::getData($request);


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
                'id' => 'required|exists:school_structures,id'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = SchoolStructures::readData($request->id);
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
                'id' => 'required|exists:school_structures,id',
                'structure_name' => 'required',
                'structure_pic' => 'required',
                'school_id' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $school_structures = SchoolStructures::where('id', $request->id)->first();
            $school_structures->update($request->all());

            $response = [
                "success" => true,
                "data" => $school_structures
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

            $school_structures = SchoolStructures::where('id', $request->id)->first();
            $school_structures->delete();

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
