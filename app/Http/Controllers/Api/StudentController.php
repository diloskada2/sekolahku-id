<?php

namespace App\Http\Controllers\Api;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function read(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:students,id'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            $data = Student::readData($request->id);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'nisn' => 'required|unique:students',
                'nis' => 'required|unique:students',
                'birth_date' => 'required',
                'blood_type' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $student = Student::create($request->all());

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    function list(Request $request)
    {
        try {
            $data = Student::getData($request);


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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */

    function update(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:students,id',
                'name' => 'required',
                'nisn' => 'required',
                'nis' => 'required',
                'birth_date' => 'required',
                'blood_type' => 'required',
                'address' => 'required',
                'class_id' => 'nullable',
                'student_track_id' => 'nullable',
                'extracurricular1_id' => 'nullable',
                'extracurricular2_id' => 'nullable',
                'extracurricular3_id' => 'nullable',
                'extracurricular4_id' => 'nullable',
                'religion_id' => 'nullable'
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $student = Student::where('id', $request->id)->first();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
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

            $student = Student::where('id', $request->id)->first();
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
