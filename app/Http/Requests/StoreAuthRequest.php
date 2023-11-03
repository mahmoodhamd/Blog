<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user_image' => 'sometimes|file'

        ];
    }




    // public function withValidator($validator)
    // {

    //     $validator->after(function ($validator) {
    //         if ($this->hasFile('user_image')) {
    //             $file = $this->file('user_image');

    //             // Check file extension
    //             $allowedExtensions = ['jpg', 'bmp', 'png', 'webp'];
    //             $fileExtension = strtolower($file->getClientOriginalExtension());

    //             if (!in_array($fileExtension, $allowedExtensions)) {
    //                 $validator->errors()->add('user_images', 'Only jpg, bmp, and png files are allowed.');
    //             }


    //         }





    //     });
    // }





}
