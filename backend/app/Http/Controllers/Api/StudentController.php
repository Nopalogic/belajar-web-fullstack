<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Success get students data.',
            'data' => $students
        ]);
    }

    public function store(Request $request)
    {
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
    }

    public function show(Request $request, Integer $id)
    {
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
            'data'=> $student
        ]);
    }

    public function update(Request $request, $id)
    {
        $students = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:256',
            'nim' => 'required|string|max:20|unique:students',
            'jurusan' => 'required|string|max:256',
        ]);

        $students->update($request->all());

        return response()->json(['statusCode' => 200, 'message' => 'Success update student data.', 'data' => $students]);
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json([
            'statusCode'=>200,
            'message'=>'Delete student data successfully'
        ]);
    }
}
