<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowingController extends Controller
{
    function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'transaction_code' => 'required|unique:borrowing_books,transaction_code',
                'member_id' => 'required',
                'book_id' => 'required',
                'borrowed_date' => 'required',
                'return_date' => 'required',
                'total_fine' => 'required'
            ]);
            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $BorrowingBook = BorrowingBook::create($request->all());

            $response = [
                "success" =>true,
                "data" => $BorrowingBook
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
            $data = BorrowingBook::getData($request);

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
                'id' => 'required|exists:borrowing_books,id'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
            }

            //use query builder at model
            $data = BorrowingBook::readData($request->id);

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
                'transaction_code' => 'required|exists:borrowing_books,transaction_code',
                'member_id' => 'required',
                'book_id' => 'required',
                'borrowed_date' => 'required',
                'return_date' => 'required',
                'total_fine' => 'required'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $BorrowingBook = BorrowingBook::where('transaction_code', $request->transaction_code)->first();
            $BorrowingBook->update($request->all());

            $response = [
                "success" => true,
                "data" => $BorrowingBook
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
                'transaction_code' => 'required|exists:borrowing_books,transaction_code'
            ]);

            if($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
                
            }

            $BorrowingBook = BorrowingBook::where('transaction_code', $request->transaction_code)->first();
            $BorrowingBook->delete();

            $response = [
                "success" => true,
                "message" => "Borrowing Book Deleted Successfully"
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

