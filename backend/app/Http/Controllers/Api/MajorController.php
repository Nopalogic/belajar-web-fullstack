<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $courses = Major::all();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Success get all majors data.',
            'data' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:225',
            'fakultas' => 'required|string|max:225'
        ]);

        Major::create($request->all());

        return response()->json([
            'statusCode' => 201,
            'message' => 'Success add major data.'
        ]);
    }
}
