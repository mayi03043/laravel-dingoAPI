<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;


class RegisterRequest extends BaseRequest
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
            'password'=>'required|min:6|max:16|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'昵称不能为空',
            'name.max' =>'昵称长度太长',

            'email.required' =>'邮箱不能为空',
            'email.email' =>'邮箱格式不正确',
            'email.unique' =>'邮箱已被注册',

            'password.required' =>'密码不能为空',
            'password.min' =>'密码长度太短',
            'password.max' =>'密码长度太长',
            'password.confirmed' =>'确认密码不一致',
        ];
    }
}
