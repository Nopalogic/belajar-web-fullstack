<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLecturerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nip' => 'required|string|max:225|unique:lecturers',
            'nama' => 'required|string|max:225',
            'gelar' => 'required|string|max:225',
            'jabatan' => 'required|string|max:225'
        ];
    }

    public function messages()
    {
        return [
            'nip.required' => 'NIP wajib diisi',
            'nip.unique' => 'NIP sudah terdaftar',
            'nip.max' => 'NIP maksimal 225 karakter',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 225 karakter',
            'gelar.required' => 'Gelar wajib diisi',
            'gelar.max' => 'Gelar maksimal 225 karakter',
            'jabatan.required' => 'Jabatan wajib diisi',
            'jabatan.max' => 'Jabatan maksimal 225 karakter'
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