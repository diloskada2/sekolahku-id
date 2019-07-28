<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{
        function create(Request $request) {
            try {
                $validator = \Validator::make($request->all(), [
                    'book_category_name' => 'required'
                ]);
    
                if($validator->fails()){ 
                    $response = [
                        "success" => false,
                        "massage" => $validator->errors()
                    ];
    
                    return response()->json($response, 400);
                }
    
                $book = Book::create($request->all());
    
                $response = [
                    "success" => true,
                    "data"    => $book
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
                $data = Book::getData($request);
    
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
                    'id' => 'required|exists:books,id'
                ]);
    
                if($validator->fails()){
                    $response = [
                        "success" => false,
                        "message" => $validator->errors()
                    ];
    
                    return response()->json($response, 400);
                }
    
                // Query Builder
                $data = Book::readData($request->id);
    
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
                    'id' => 'required|exists:books,id',
                    'book_category_name' => 'required',
                    'book_category_desc' => 'required',    
                ]);
    
                if($validator->fails()) {
                    $response = [
                        "success" => false,
                        "message" => $validator->erorrs()
                    ];
    
                return response()->json($response, 400);
            }
    
            $book = Book::where('id', $request->id)->first();
            $book->update($request->all());
    
            $response = [
                "success" => true,
                "data" => $book
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
                  'id' => 'required|exists:books,id'
              ]);
              if($validator->fails()) {
                  $response = [
                      "success" => false,
                      "message" => $validator->errors()
                  ];
                  
                  return response()->json($response, 400);
              }
    
              $book = Book::where('id', $request->id)->first();
              $book->delete();
    
              $response = [
                  "success" => true,
                  "message" => "book deleted successfully"
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
