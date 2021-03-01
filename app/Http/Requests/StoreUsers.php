<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
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
            'address' => 'nullable',
            'telephone' => 'nullable|digits:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm__password' => 'required|same:password'
        ];
    }
}
