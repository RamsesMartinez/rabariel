<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class ContentRequest extends Request{
   
    public function authorize(){
        return true;
    }

    
    public function rules(){
       
        return [
            'menu' => 'not_in:-1',
            'title' => 'required|min:2|max:70',
    
            
        ];
    }
    
    public function messages(){
        return [
           'menu.not_in' => 'Debes elegir un menu.', 
        ];
    }
}
