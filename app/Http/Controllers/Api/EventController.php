<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events;

class EventController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'event_name' => 'required',
                'event_description' => 'required'
                // 'created_by' => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $events = Events::create($request->all());

            $response = [
                "success" => true,
                "data" => $events
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
            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            // $data = Events::getData($request);

            // YANG INI PAKE ELOQUENT
            $data = Events::all();

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

    function read(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:events,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            // YANG INI PAKE QUERY BUILDER ADA DI DALAM MODEL RELIGION
            // $data = Events::readData($request->id);

            // YANG INI PAKE ELOQUENT
            $data = Events::where('id', $request->id)->first();

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
                'id' => 'required|exists:events,id',
                'event_name' => 'required',
                'event_description' => 'required'
                // 'created_by' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $events = Events::where('id', $request->id)->first();
            $events->update($request->all());

            $response = [
                "success" => true,
                "data" => $events
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
                'id' => 'required|exists:events,id'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $events = Events::where('id', $request->id)->first();
            $events->delete();

            $response = [
                "success" => true,
                "message" => "Events deleted successfully"
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
