<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UsuarioEditRequest extends Request
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

    public function __construct(Route $route)
    {
        $this->route=$route;
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
            'email' => 'required | email | unique:users,email,'.$this->route->parameters()['user'],
            'about' => 'min:10 | max: 300',
            'password' => 'min:6',
            'rol' => 'required',
            'country_id' =>'required',
            'accept_terms' => 'required',
            'path' => 'image',
        ];
    }
}
