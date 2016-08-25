<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Cart;
use DB;

class Order extends Model
{
    static public function saveOrder() {
        $cartCollection = Cart::getContent();
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->data = $cartCollection->toJson();
        $order->total = Cart::getTotal();
        $order->save();
        Cart::clear();
        Session::flash('sm', "Tu compra fue guardada");
    }
    
    static public function getAllOrders(&$data){
        
        $sql = "SELECT u.name,o.* FROM orders o "
                . "JOIN users u ON u.id = o.user_id "
                . "ORDER BY o.created_at DESC";
        
        $data['orders'] = DB::select($sql);
        
    }
    
}
