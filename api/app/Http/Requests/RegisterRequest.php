<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * TODO Unit test
     */
    public function rules()
    {
        // TODO Implement password confirmation
        return [
            "name" => "required|min:2",
            "email" => "required|email|unique:users",
            "password" => "required|min:5|max:5",
            "password_confirm" => "required|same:password",
        ];
    }
}
