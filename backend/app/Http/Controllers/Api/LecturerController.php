<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLecturerRequest;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        try {
            $courses = Lecturer::all();

            return response()->json([
                'statusCode' => 200,
                'message' => 'Success get all lecturer data.',
                'data' => $courses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to get lecturer data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreLecturerRequest $request)
    {
        try {
            $request->validate([
                'nip' => 'required|string|max:225|unique:lecturers',
                'nama' => 'required|string|max:225',
                'gelar' => 'required|string|max:225',
                'jabatan' => 'required|string|max:225'
            ]);

            Lecturer::create($request->all());

            return response()->json([
                'statusCode' => 201,
                'message' => 'Success add lecturer data.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to add lecturer data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
