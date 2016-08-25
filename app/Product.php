<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;

class Product extends Model {

    static public function getProducts($cat_url, &$data) {
        
        $data['products'] = [];
        
        if ($category = Categorie::where('url', '=', $cat_url)->first()) {
            
            $category = $category->toArray();
            $data['title'] = $category['title'] . ' products';
            $data['cat_url'] = $category['url'];
            
            if ($products = Categorie::find($category['id'])->products)
                    {
                $data['products'] = $products->toArray();
                
            }
        }
    }
    
    static public function getItem($product_url, &$data){
        
        $data['item'] = [];
        
        if($item = Product::where('url', '=', $product_url)->first()){
            $data['item'] = $item->toArray();
            $data['title'] = $data['item']['title'];
            
        }
    }
    
    static public function addToCart ( $id ){
        
        if($product = Product::find( $id )){
            $product = $product->toArray();
           if ( ! Cart::get($product['id'])){
                Cart::add($product['id'], $product['title'], $product['price'], 1, []);
                Session::flash('sm', $product['title'] . ' agregado al carrito');
           }
        }
        
        
        
    }
    static public function cartUpdate ($input){
        if(!empty($input['id']) && !empty($input['op'])){
            
            if($product = Cart::get($input['id'])){
                $product = $product->toArray();
                if($input['op'] == 'plus'){
                    Cart::update($input['id'], ['quantity' => 1,]);
                    Session::flash('sm', 'El carrito fue actualizado');
                } else if($input['op'] == 'minus'){
                    if($product['quantity'] - 1 == 0 ){
                       Cart::remove($input['id']);
                       Session::flash('sm', 'El item fue quitado');
                    } else {
                        Cart::update($input['id'], ['quantity' => -1,]);
                        Session::flash('sm', 'El carrito fue actualizado');
                    }
                }
            }
        }
    }
    
    static public function addProduct($request){
        
        $image_name = 'default.jpg';
        
         if ($request->hasFile('image') && $request->file('image')->isValid()){
         $image_name = str_random(5) . date('y.m.d.H.i.s') . str_random(5) . '.' . $request->file('image')->getClientOriginalExtension();   
         $request->file('image')->move( public_path(). '/images', $image_name);
                 
        }
        
        $product = new self();
        $product->title = $request['title'];
        $product->article = $request['article'];
        $product->image = $image_name;
        $product->url = $request['url'];
        $product->price = $request['price'];
        $product->categorie_id = $request['category'];
        $product->save();
        Session::flash('sm', 'un nuevo producto fue agregado');
    }
    
    static public function updateProduct($request, $id){
        
        $image_name = '';
        
        if ($request->hasFile('image') && $request->file('image')->isValid()){
         $image_name = str_random(5) . date('y.m.d.H.i.s') . str_random(5) . '.' . $request->file('image')->getClientOriginalExtension();   
         $request->file('image')->move( public_path(). '/images', $image_name);
                 
        }
        
        $product = Product::find($id);
        $product->title = $request['title'];
        $product->article = $request['article'];
        
        if($image_name){
            
        $product->image = $image_name;
        
        }
        
        $product->url = $request['url'];
        $product->price = $request['price'];
        $product->categorie_id = $request['category'];
        $product->save();
        Session::flash('sm', 'El producto fue actualizado');
        
    }
    
}
