<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $courses = Lecturer::all();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Success get all lecturer data.',
            'data' => $courses
        ]);
    }

    public function store(Request $request)
    {
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
    }
}
