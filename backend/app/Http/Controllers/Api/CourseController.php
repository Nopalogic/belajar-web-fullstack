<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        try {
            $courses = Course::all();

            return response()->json([
                'statusCode' => 200,
                'message' => 'Success get all courses data.',
                'data' => $courses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to get courses data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreCourseRequest $request)
    {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to add course data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
