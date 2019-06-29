<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'user_as' => 'required',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }
    
            $dataToCreate = [
                "name"  => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_as' => $request->user_as,
            ];
 
            $user = User::create($dataToCreate);
    
            $response = [
                "success" => true,
                "data" => $user
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
        $data = User::listData();

        $response = [
            "success" => true,
            "data" => $data
        ];

        return response()->json($response, 200);
    }

    function read(Request $request) {
        try {
            $validator = \Validator::make($request->all(),[
                'id' => 'required',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $userExist = User::where('id', $request->id)->first();
            if(!$userExist) {
                $response = [
                    "success" => false,
                    "message" => "User tidak di temukan !"
                ];
                return response()->json($response, 400);
            }

            $user = User::getById($request->id);

            $response = [
                "success" => true,
                "data" => $user
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
            $validator = \Validator::make($request->all(),[
                'id' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'user_as' => 'required',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $user = User::where('id', $request->id)->first();
            $user->update($request->all());
            
            $response = [
                "success" => true,
                "message" => User::getById($request->id)
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
            $validator = \Validator::make($request->all(),[
                'id' => 'required|exists:users,id',
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $user = User::where('id', $request->id)->first();
            $user->delete();
            
            $response = [
                "success" => true,
                "message" => "User deleted successfully"
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
