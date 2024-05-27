<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ReportPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'category' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|max:100',
            'time' => 'required',
            'is_private' => 'boolean',
            'is_anonymous' => 'boolean',
            'evidences' => 'array',
            'evidences.*.title' => 'string|max:50|nullable|required_with:evidences.*.photo,evidences.*.description',
            'evidences.*.photo' => 'mimes:jpeg,jpg,png|max:1048|image|nullable|required_with:evidences.*.title,evidences.*.description',
            'evidences.*.description' => 'string|nullable',
            'witnesses' => 'array',
            'witnesses.*.name' => 'max:100|string|nullable|required_with:witnesses.*.phone,witnesses.*.address,witnesses.*.description',
            'witnesses.*.phone' => 'max:20|nullable|required_with:witnesses.*.name,witnesses.*.address,witnesses.*.description',
            'witnesses.*.address' => 'max:255|nullable|required_with:witnesses.*.name,witnesses.*.phone,witnesses.*.description',
            'witnesses.*.description' => 'nullable|required_with:witnesses.*.phone,witnesses.*.address,witnesses.*.name',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'evidences.*.title.required_with' => 'Data tidak boleh kosong!',
            'evidences.*.photo.required_with' => 'File bukti harus diisi!',
            'witnesses.*.name.required_with' => 'Data tidak boleh kosong!',
            'witnesses.*.phone.required_with' => 'Data tidak boleh kosong!',
            'witnesses.*.address.required_with' => 'Data tidak boleh kosong!',
            'witnesses.*.description.required_with' => 'Data tidak boleh kosong!'
        ];
    }
}
