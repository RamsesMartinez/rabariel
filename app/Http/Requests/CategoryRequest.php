<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class CategoryRequest extends Request{
   
    public function authorize(){
        return true;
    }

    
    public function rules(){
        $all = Input::all();
        $category_id = !empty($all['category_id']) ? ',' . $all['category_id'] : '';
        
        return [
            'title' => 'required|min:2|max:70',
            'url' => 'required|regex:/^[a-z\d-]+$/ | unique:categories,url' . $category_id,
            'image' => 'image',
        ];
    }
    
    public function messages(){
        return [
            'url.regex' => 'Solo a-z y numeros y -',
        ];
    }
}
