<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserSubscribeToWebsite extends AppRequest
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
            'user_id' => [
                'required',
                'exists:users,id',
                Rule::unique('users_subscriptions')->where(function ($query) {
                    return $query->where('website_id', $this->website_id)
                        ->where('user_id', $this->user_id);
                })
            ],
        ];
    }
}
