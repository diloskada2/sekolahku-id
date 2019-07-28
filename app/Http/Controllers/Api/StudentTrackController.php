<?php

namespace App\Http\Controllers;

use App\StudentTrack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'nisn' => 'required|unique:students',
                'nis' => 'required|unique:students',
                'birth_date' => 'required',
                'blood_type' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                $response = [
                    "success" => false,
                    "message" => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $student = Student::create($request->all());

            $response = [
                "success" => true,
                "message" => $student
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentTrack  $studentTrack
     * @return \Illuminate\Http\Response
     */
    public function show(StudentTrack $studentTrack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentTrack  $studentTrack
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentTrack $studentTrack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentTrack  $studentTrack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentTrack $studentTrack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentTrack  $studentTrack
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentTrack $studentTrack)
    {
        //
    }
}
