<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nim' => 'required|string|max:225|unique:students',
            'nama' => 'required|string|max:225',
            'jurusan' => 'required|string|max:225'
        ];
    }

    public function messages()
    {
        return [
            'nim.required' => 'NIM wajib diisi',
            'nim.unique' => 'NIM sudah terdaftar',
            'nim.max' => 'NIM maksimal 225 karakter',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 225 karakter',
            'jurusan.required' => 'Jurusan wajib diisi',
            'jurusan.max' => 'Jurusan maksimal 225 karakter'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'statusCode' => 422,
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
        ], 422));
    }
}
