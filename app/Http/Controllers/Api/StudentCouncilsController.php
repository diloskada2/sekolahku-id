<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentCouncils;

class StudentCouncilsController extends Controller
{
    public function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'leader'        => 'required',
                '2nd_leader'    => 'required',
                'secretary'     => 'required',
                'treasurer'     => 'required',
                'coach'         => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $student_councils = StudentCouncils::create($request->all());

            $response = [
                "success"   => true,
                "data"      => $student_councils
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

    public function list(request $request) {
        try {
            $student_councils = StudentCouncils::all();

            $response = [
                "success"   => true,
                "student_councils"      => $student_councils
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
                'id' => 'required|exists:student_councils,id'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);

            }

            $student_councils = StudentCouncils::where('id', $request->id)->first();

            $response = [
                "success" => true,
                "student_councils" => $student_councils,
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
                'id' => 'required|exists:student_councils,id',
                'leader'     => 'required',
                '2nd_leader'   => 'required',
                'secretary'   => 'required',
                'treasurer'   => 'required',
                'coach'   => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $student_councils = StudentCouncils::where('id', $request->id)->first();

            $student_councils->update($request->all());

            $response = [
                "success" => true,
                "data" => $student_councils
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
                'id' => 'required|exists:student_councils,id'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);

            }

            $student_councils = StudentCouncils::where('id', $request->id)->first();

            $student_councils->delete();

            $response = [
                "success" => true,
                "message" => "Student Councils deleted successfully"
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
