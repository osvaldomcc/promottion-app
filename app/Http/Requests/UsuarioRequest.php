<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'name' => 'required | min:2',
            'firstname' => 'min:4',
            'lastname' => 'min:4',
            'email' => 'required | email | unique:users',
            'about' => 'min:10 | max: 300',
            'password' => 'required',
            'rol' => 'required',
            'country_id' =>'required',
            'accept_terms' => 'required',
            'path' => 'image',
        ];
    }
}
