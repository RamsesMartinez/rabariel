<?php namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Content;
use App\Order;

class CmsController extends MainController
{
    function __construct(){
        parent::__construct();
        $this->middleware('adminSigned');
    }
    
    
  public function getDashboard(){
      
      return view('cms.dashboard', self::$data);
      
  }
  
  public function getOrders(){
      Order::getAllOrders(self::$data);
      return view('cms/orders', self::$data);
  }
  
}
