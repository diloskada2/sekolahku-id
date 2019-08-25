<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Teacher;

class TeacherController extends Controller
{
    public function create(request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'teacher_name'     => 'required',
                'religion_id'   => 'required',
                'user_id'   => 'required',
                'course_id'   => 'required'
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
            $teacher = Teacher::create($request->all());

            // success response
            $response = [
                "success"   => true,
                "data"      => $teacher
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
            $teacher = Teacher::all();

            // success responce
            $response = [
                "success"   => true,
                "teacher"      => $teacher
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
                'id' => 'required|exists:teachers,id',
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
            $teacher = Teacher::where('id', $request->id)->first();

            // success response
            $response = [
                "success" => true,
                "teacher" => $teacher,
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
                'id' => 'required|exists:teachers,id',
                'teacher_name' => 'required',
                'religion_id' => 'required',
                'user_id' => 'required',
                'course_id' => 'required'
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
            $teacher = Teacher::where('id', $request->id)->first();

            // update data with eloquent
            $teacher->update($request->all());

            // success response
            $response = [
                "success" => true,
                "data" => $teacher
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
                'id' => 'required|exists:teachers,id'
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
            $teacher = Teacher::where('id', $request->id)->first();

            // delete data with eloquent
            $teacher->delete();

            // success response
            $response = [
                "success" => true,
                "message" => "Teacher deleted successfully"
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
