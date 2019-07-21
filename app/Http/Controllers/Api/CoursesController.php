<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Courses;

class CoursesController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'course_name' => 'required|unique:courses,course_name'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $courses = Courses::create($request->all());

            $response = [
                "success" => true,
                "data" => $courses
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
            $data = Courses::getData($request);

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

    function read(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:courses,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $data = Courses::readData($request->id);
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

    function update(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:courses,id',
                'course_name' => 'required',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $courses = Courses::where('id', $request->id)->first();
            $courses->update($request->all());

            $response = [
                "success" => true,
                "data" => $courses
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
                'id' => 'required|exists:courses,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $courses = Courses::where('id', $request->id)->first();
            $courses->delete();

            $response = [
                "success" => true,
                "message" => "Delete Berhasil"
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
