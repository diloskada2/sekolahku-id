<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publisher;

class PublisherController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'publisher_name' => 'required',
                'addres' => 'required',
                'phone_number' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $publisher = Publisher::create($request->all());

            $response = [
                "success" =>true,
                "data" => $publisher
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
            $data = Publisher::getData($request);

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
                'id' => 'required|exists:publishers,id'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
            }

            //use query builder at model
            $data = Publisher::readData($request->id);

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
                'id' => 'required|exists:publishers,id',
                'publisher_name' => 'required',
                'addres' => 'required',
                'phone_number' => 'required'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $publisher = Publisher::where('id', $request->id)->first();
            $publisher->update($request->all());

            $response = [
                "success" => true,
                "data" => $publisher
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
                'id' => 'required|exists:publishers,id'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
                
            }

            $publisher = Publisher::where('id', $request->id)->first();
            $publisher->delete();

            $response = [
                "success" => true,
                "message" => "Publisher Deleted Successfully"
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
