<?php

namespace App\Http\Controllers\Api;

use App\StudentTrack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentTrackController extends Controller
{
    function create(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'track_name' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $student = StudentTrack::create($request->all());

            $response = [
                "success" => true,
                "message" => $student
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
            $data = StudentTrack::getData($request);


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
                'id' => 'required|exists:student_tracks,id'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = StudentTrack::readData($request->id);
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
                'id' => 'required|exists:student_tracks,id',
                'track_name' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $student = StudentTrack::where('id', $request->id)->first();
            $student->update($request->all());

            $response = [
                "success" => true,
                "data" => $student
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

            $student = StudentTrack::where('id', $request->id)->first();
            $student->delete();

            $response = [
                "success" => true,
                "message" => "student deleted successfully"
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
