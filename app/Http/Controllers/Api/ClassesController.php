<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes;

class ClassesController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(),[
                'class_name' => 'required|unique:classes,class_name',
                //'homeroom_teacher_id' => 'required|unique:classes,homeroom_teacher_id',
                'class_leader' => 'required',
                'class_2nd_leader' => 'required',
                'class_treasurer' => 'required',
                'class_secretary' => 'required',
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }
    
            $dataToCreate = [
                "class_name"  => $request->class_name,
                //'home_teacher_id' => $request->home_teacher_id,
                'class_leader' => $request->class_leader,
                'class_2nd_leader' => $request->class_2nd_leader,
                'class_treasurer' => $request->class_treasurer,
                'class_secretary' => $request->class_secretary,
            ];
 
            $classes = Classes::create($dataToCreate);
    
            $response = [
                "success" => true,
                "data" => $classes
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
        // listData adalah static function yang di buat di dalam model user
        $data = Classes::all();

        $response = [
            "success" => true,
            "data" => $data
        ];

        return response()->json($response, 200);
    }

    function update(Request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:classes,id',
                'class_name' => 'required|unique:classes,class_name',
                //'homeroom_teacher_id' => 'required|unique:classes,homeroom_teacher_id',
                'class_leader' => 'required',
                'class_2nd_leader' => 'required',
                'class_treasurer' => 'required',
                'class_secretary' => 'required'
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
            $classes = Classes::where('id', $request->id)->first();

            // update data with eloquent
            $classes->update($request->all());

            // success response
            $response = [
                "success" => true,
                "data" => $classes
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
        try {
            $validator = \Validator::make($request->all(),[
                'id' => 'required|exists:classes,id',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $classes = Classes::where('id', $request->id)->first();
            $classes->delete();
            
            $response = [
                "success" => true,
                "message" => "Class deleted successfully"
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
