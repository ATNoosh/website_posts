<?php

namespace App\Http\Requests;

class AddPost extends AppRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'website_id' => ['required', 'exists:websites,id'],
            'post_address' => ['required', 'url', 'string', 'min:3', 'max:1000', 'unique:posts,post_address'],
            'title' => ['required', 'string', 'min:3', 'max:1000'],
            'description' => ['required', 'string', 'min:3', 'max:1000'],
        ];
    }
}
