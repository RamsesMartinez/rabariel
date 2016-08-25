<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class ProductRequest extends Request{
   
    public function authorize(){
        return true;
    }

    
    public function rules(){
        $all = Input::all();
        $product_id = !empty($all['product_id']) ? ',' . $all['product_id'] : '';
        
        return [
            'category' => 'not_in:-1',
            'title' => 'required|min:2|max:70',
            'url' => 'required|regex:/^[a-z\d-]+$/ | unique:categories,url' . $product_id,
            'price' => 'required|numeric',
            'image' => 'image',
        ];
    }
    
    public function messages(){
        return [
            'category.not_in' => 'Debes elegir una categoria.',
            'url.regex' => 'Solo a-z y numeros y -',
        ];
    }
}
