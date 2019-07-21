<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;

class BlogController extends Controller
{
    public function create(request $request) {
        // error handling
        try {
            // validate
            $validator = \Validator::make($request->all(), [
                'title'     => 'required',
                'content'   => 'required',
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
            $blog = Blog::create($request->all());

            // success response
            $response = [
                "success"   => true,
                "data"      => $blog
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
            $blog = Blog::all();

            // success responce
            $response = [
                "success"   => true,
                "blog"      => $blog
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
                'id' => 'required|exists:blogs,id'
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
            $blog = Blog::where('id', $request->id)->first();

            // success response
            $response = [
                "success" => true,
                "blog" => $blog,
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
                'id' => 'required|exists:blogs,id',
                'title' => 'required',
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
            $blog = Blog::where('id', $request->id)->first();

            // update data with eloquent
            $blog->update($request->all());

            // success response
            $response = [
                "success" => true,
                "data" => $blog
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
                'id' => 'required|exists:blogs,id'
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
            $blog = Blog::where('id', $request->id)->first();

            // delete data with eloquent
            $blog->delete();

            // success response
            $response = [
                "success" => true,
                "message" => "Blog deleted successfully"
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
