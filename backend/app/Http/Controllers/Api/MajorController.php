<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        try {
            $courses = Major::all();

            return response()->json([
                'statusCode' => 200,
                'message' => 'Success get all majors data.',
                'data' => $courses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to get majors data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreMajorRequest $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:225',
                'fakultas' => 'required|string|max:225'
            ]);

            Major::create($request->all());

            return response()->json([
                'statusCode' => 201,
                'message' => 'Success add major data.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to add major data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}