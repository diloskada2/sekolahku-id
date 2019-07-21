<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Staff;

class StaffController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'staff_name' => 'required'
            ]);

            if($validator->fails()){ 
                $response = [
                    "success" => false,
                    "massage" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $staff = Staff::create($request->all());

            $response = [
                "success" => true,
                "data"    => $staff
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
            //Ini Query Builder
            $data = Staff::getData($request);

            //Ini Pake Eloquent
            //$data2 = Staff::all();
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
                'id' => 'required|exists:staffs,id'
            ]);

            if($validator->fails()){
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // Query Builder
            $data = Staff::readData($request->id);

            // Eloquent
            // $data2 = Staff::where('id', $request->id)->first();
            
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
                'id' => 'required|exists:staffs,id',
                'staff_name' => 'required',
                'religion_id' => 'required',    
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->erorrs()
                ];

            return response()->json($response, 400);
        }

        $staff = Staff::where('id', $request->id)->first();
        $staff->update($request->all());

        $response = [
            "success" => true,
            "data" => $staff
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
              'id' => 'required|exists:staffs,id'
          ]);
          if($validator->fails()) {
              $response = [
                  "success" => false,
                  "message" => $validator->errors()
              ];
              
              return response()->json($response, 400);
          }

          $staff = Staff::where('id', $request->id)->first();
          $staff->delete();

          $response = [
              "success" => true,
              "message" => "Staff deleted successfully"
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