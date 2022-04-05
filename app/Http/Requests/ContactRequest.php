<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     */
    public function rules()
    {
        return [
            "name" => "required|max:255",
            "phone" => "required|max:10",
            "age" => "required|max:99|min:18|numeric",
            "g-recaptcha-response" => "required"
        ];
    }
}

// <input type="hidden" value="dsjhdj" name="g-recaptcha-response">