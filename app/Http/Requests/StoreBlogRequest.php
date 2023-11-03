<?php


namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Blog;


class StoreBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'short_description' => 'required',
            'slug' =>'required|max:255|unique:blogs,slug,', // Ignore the current blog when updating

        ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            if ($this->hasFile('image')) {
                $file = $this->file('image');

                // Check file extension
                $allowedExtensions = ['jpg', 'bmp', 'png', 'webp'];
                $fileExtension = strtolower($file->getClientOriginalExtension());

                if (!in_array($fileExtension, $allowedExtensions)) {
                    $validator->errors()->add('image', 'Only jpg, bmp, and png files are allowed.');
                }


            }


            if (Blog::where('slug', $this->input('slug'))->exists()) {
                $validator->errors()->add('slug', 'The slug is not unique.');
            }


        });
    }
}

