<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class StudentController extends Controller
{
    public function index()
    {
        try {
            $students = Student::all();
            return response()->json([
                'statusCode' => 200,
                'message' => 'Success get students data.',
                'data' => $students
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to get students data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            $request->validate([
                'nim' => 'required|string|max:225|unique:students',
                'nama' => 'required|string|max:225',
                'jurusan' => 'required|string|max:225'
            ]);

            Student::create($request->all());

            return response()->json([
                'statusCode' => 201,
                'message' => 'Success add student data.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to add student data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Request $request, Integer $id)
    {
        try {
            $request->validate([
                'nim' => 'required|string|max:225|unique:students',
                'nama' => 'required|string|max:225',
                'jurusan' => 'required|string|max:225'
            ]);

            $student = Student::find($id);

            $student->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'jurusan' => $request->jurusan
            ]);

            return response()->json([
                'statusCode' => 200,
                'message' => 'Success update student data.',
                'data' => $student
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to update student data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        try {
            $students = Student::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:256',
                'nim' => 'required|string|max:20|unique:students',
                'jurusan' => 'required|string|max:256',
            ]);

            $students->update($request->all());

            return response()->json(['statusCode' => 200, 'message' => 'Success update student data.', 'data' => $students]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to update student data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            return response()->json([
                'statusCode' => 200,
                'message' => 'Delete student data successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'Failed to delete student data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
