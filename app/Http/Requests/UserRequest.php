<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $roles = [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'password' => 'required|confirmed'
        ];
        if ($this->getMethod() == 'PUT') {
            $roles = [
                'email' => 'required|email|unique:users,email,' . $this->user()->id,
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'password' => 'sometimes|confirmed',
            ];
        }
        return $roles;
    }
}
