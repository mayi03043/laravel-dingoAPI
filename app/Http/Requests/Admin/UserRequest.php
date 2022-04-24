<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends BaseRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required|max:16',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:16',
            

        ];
    }

    public function attributes()
    {
        return [
            'name' =>'昵 称:',
            'email' =>'邮 箱:',
            'password' =>'密 码:',

            
        ];
    }
}
