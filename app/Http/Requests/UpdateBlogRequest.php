<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required',
            'short_description' => 'required',
             'image' => 'sometimes|file',
            'slug' => 'required|max:255|unique:blogs,slug,'

        ];
    }


    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        // Check if the 'image' field exists in the validated data
        if ($this->hasFile('image')) {
            $file = $this->file('image');

            // Define allowed extensions
            $allowedExtensions = ['jpg', 'bmp', 'png', 'webp'];
            $fileExtension = strtolower($file->getClientOriginalExtension());

            if (!in_array($fileExtension, $allowedExtensions)) {
                $validator->errors()->add('image', 'Only jpg, bmp, and png files are allowed.');
            }
        }
    });
}



public function updateBlogData()
{
    $validated = $this->validated();
    $data = [
        'title' => $validated['title'],
        'short_description' => $validated['short_description'],
        'slug' => $validated['slug'],

    ];

    if ($this->hasFile('image')) {
        $file = $this->file('image');
        $fileExtension = $file->getClientOriginalExtension();
        $uniqueFileName = time() . '_' . $this->id . '.' . $fileExtension;
        $filePath = $file->storeAs('public/images', $uniqueFileName);
        $filename = pathinfo($filePath, PATHINFO_BASENAME);
        $data['image'] = 'images/'.$filename;
    }

    return $data;
}







}
