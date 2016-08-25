<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class MenuRequest extends Request{
   
    public function authorize(){
        return true;
    }

    
    public function rules(){
        $all = Input::all();
        $menu_id = !empty($all['menu_id']) ? ',' . $all['menu_id'] : '';
        
        return [
            'link' => 'required|min:2|max:70',
            'title' => 'required|min:2|max:70',
    'url' => 'required|regex:/^[a-z\d-]+$/ | unique:menus,url' . $menu_id,
            
        ];
    }
    
    public function messages(){
        return [
            'url.regex' => 'Solo a-z y numeros y -',
        ];
    }
}
