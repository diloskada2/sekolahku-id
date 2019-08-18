<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extracurricular;

class ExtracurricularController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'extracurricular_name' => 'required|unique:extracurriculars,extracurricular_name',
                'extracurricular_leader_id' => 'required',
                'extracurricular_coach_id' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $extracurricular = Extracurricular::create($request->all());

            $response = [
                "success" =>true,
                "data" => $extracurricular
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
            // use query builder at model
            $data = Extracurricular::getData($request);

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

    function read(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:extracurriculars,id'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
            }

            //use query builder at model
            $data = Extracurricular::readData($request->id);

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

    function update(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:extracurriculars,id',
                'extracurricular_leader_id' => 'required',
                'extracurricular_coach_id' => 'required'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $extracurricular = Extracurricular::where('id', $request->id)->first();
            $extracurricular->update($request->all());

            $response = [
                "success" => true,
                "data" => $extracurricular
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
                'id' => 'required|exists:extracurriculars,id'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
                
            }

            $extracurricular = Extracurricular::where('id', $request->id)->first();
            $extracurricular->delete();

            $response = [
                "success" => true,
                "message" => "Extracurricular Deleted Successfully"
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
