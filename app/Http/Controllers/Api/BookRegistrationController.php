<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BookRegistration;

class BookRegistrationController extends Controller
{
    public function create(request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'id_book'   => 'required',
                'shelf_code'   => 'required',
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
            $bookregistration = BookRegistration::create($request->all());

            // success response
            $response = [
                "success"   => true,
                "data"      => $bookregistration
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
            $bookregistration = BookRegistration::all();

            // success responce
            $response = [
                "success"   => true,
                "bookregistration"      => $bookregistration
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
                'no_reg' => 'required|exists:book_registrations,no_reg'
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
            $bookregistration = BookRegistration::where('no_reg', $request->id)->first();

            // success response
            $response = [
                "success" => true,
                "bookregistration" => $bookregistration,
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
                'no_reg' => 'required|exists:book_registrations,no_reg',
                'id_book' => 'required',
                'shelf_code' => 'required',
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
            $bookregistration = BookRegistration::where('no_reg', $request->id)->first();

            // update data with eloquent
            $bookregistration->update($request->all());

            // success response
            $response = [
                "success" => true,
                "data" => $bookregistration
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
                'no_reg' => 'required|exists:book_registrations,no_reg'
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
            $bookregistration = BookRegistration::where('no_reg', $request->id)->first();

            // delete data with eloquent
            $bookregistration->delete();

            // success response
            $response = [
                "success" => true,
                "message" => "Book Registration deleted successfully"
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
