<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class MemberController extends Controller
{
    public function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'member_name'        => 'required',
                'address'    => 'required',
                'phone_number'     => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $member = Member::create($request->all());

            $response = [
                "success"   => true,
                "data"      => $member
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
            $member = Member::all();

            $response = [
                "success"   => true,
                "members"      => $member
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
                'id' => 'required|exists:members,id'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);

            }

            $member = Member::where('id', $request->id)->first();

            $response = [
                "success" => true,
                "members" => $member,
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
                'id' => 'required|exists:members,id',
                'member_name'        => 'required',
                'address'    => 'required',
                'phone_number'     => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $member = Member::where('id', $request->id)->first();

            $member->update($request->all());

            $response = [
                "success" => true,
                "data" => $member
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
                'id' => 'required|exists:members,id'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);

            }

            $member = Member::where('id', $request->id)->first();

            $member->delete();

            $response = [
                "success" => true,
                "message" => "Member deleted successfully"
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
