<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Success get all courses data.',
            'data' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:225|unique:courses',
            'nama' => 'required|string|max:225',
            'sks' => 'required|int|max:9',
            'semester' => 'required|int|max:9'
        ]);

        Course::create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'Success add course data.'
        ]);
    }
}
