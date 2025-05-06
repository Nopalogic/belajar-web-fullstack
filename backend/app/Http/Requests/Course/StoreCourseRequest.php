<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kode' => 'required|string|max:225|unique:courses',
            'nama' => 'required|string|max:225',
            'sks' => 'required|integer|max:9',
            'semester' => 'required|integer|max:9'
        ];
    }

    public function messages()
    {
        return [
            'kode.required' => 'Kode mata kuliah wajib diisi',
            'kode.unique' => 'Kode mata kuliah sudah terdaftar',
            'kode.max' => 'Kode maksimal 225 karakter',
            'nama.required' => 'Nama mata kuliah wajib diisi',
            'nama.max' => 'Nama maksimal 225 karakter',
            'sks.required' => 'SKS wajib diisi',
            'sks.integer' => 'SKS harus berupa angka',
            'sks.max' => 'SKS maksimal 9',
            'semester.required' => 'Semester wajib diisi',
            'semester.integer' => 'Semester harus berupa angka',
            'semester.max' => 'Semester maksimal 9'
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