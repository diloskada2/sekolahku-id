<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{
    public function create(Request $request) {
        try {
            $validator = \Validator::make($request->all(), [
                'book_title'        => 'required',
                'id_publisher'    => 'required',
                'id_author'     => 'required',
                'fiscal_year'     => 'required',
                'book_number'         => 'required',
                'procurement_date'         => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $book = Book::create($request->all());

            $response = [
                "success"   => true,
                "book"      => $book
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
            $book = Book::all();

            $response = [
                "success"   => true,
                "book"      => $book
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

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);

            }

            $book = Book::where('id', $request->id)->first();

            $response = [
                "success" => true,
                "books" => $book,
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
                'book_title'        => 'required',
                'id_publisher'    => 'required',
                'id_author'     => 'required',
                'fiscal_year'     => 'required',
                'book_number'         => 'required',
                'procurement_date'         => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];

                return response()->json($response, 400);
            }

            $book = Book::where('id', $request->id)->first();

            $book->update($request->all());

            $response = [
                "success" => true,
                "book" => $book
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

            if ($validator->fails()) {
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
                "message" => "Books deleted successfully"
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
