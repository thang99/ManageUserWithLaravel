<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'birthday' => 'nullable',
            'email' => 'required|email',
            'address' => 'nullable',
            'telephone' => 'nullable|digits:10',
            'role' => 'required'
        ];
    }
}

// The $this->user will return the user ID coming from the request.