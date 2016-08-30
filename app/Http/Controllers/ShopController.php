<?php namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Categorie;
use App\Product;
use Cart;
use Input;
use Session;
use App\Order;

class ShopController extends MainController
{
    
    
    public function index(){
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['title'] = 'categories page';
        return view('content.categories', self::$data);
    }
    
   public function products($cat_url){
       Product::getSortedProductsDes($cat_url, self::$data);
       return view('content.products', self::$data);
   }
   
   public function item($cat_url, $product_url) {
       Product::getItem($product_url, self::$data);
       return view('content.item', self::$data);
   }
   
   public function addToCart(){
      Product::addToCart( Input::get('id') );
   }
   
   public function checkout(){
       $cartCollection = Cart::getContent();
       $cart = $cartCollection->toArray();
       sort($cart);
       self::$data['cart'] = $cart;
       self::$data['title'] = 'Comprar ya!';
       return view('content.checkout', self::$data);
   }
   
   public function cartClear(){
       Cart::clear();
       Session::flash('sm', 'El carrito fue vaciado');
       return redirect('shop/checkout');
   }
   
   public function updateCart(){
       Product::cartUpdate( Input::all() );
   }
   
   public function order(){
       if(!Session::has('user_id')){
           Session::flash('sm', 'Debes entrar con tu cuenta primero');
           return redirect('user/signin?des=shop/checkout');
       } else {
           if(Cart::isEmpty()){
               return redirect('shop/checkout');
           } else {
               Order::saveOrder();
               return redirect('shop');
           }
       }
   }
    
}
