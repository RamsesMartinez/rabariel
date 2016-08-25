<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Signup extends Request{
   
    public function authorize(){
        return true;
    }

    
    public function rules(){
        return [
            'name' => 'required|min:2|max:255|regex:/^[a-z]+(\s[a-z]+)*$/i',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages(){
    return[
        'name.regex' => 'El nombre debe contener solamente letras',
    ];
}
}

