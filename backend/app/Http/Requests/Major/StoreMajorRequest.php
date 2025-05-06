<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMajorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:225',
            'fakultas' => 'required|string|max:225'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama jurusan wajib diisi',
            'nama.max' => 'Nama jurusan maksimal 225 karakter',
            'fakultas.required' => 'Fakultas wajib diisi',
            'fakultas.max' => 'Nama fakultas maksimal 225 karakter'
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
