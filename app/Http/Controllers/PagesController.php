<?php namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Content;

class PagesController extends MainController
{
    
    
    public function index(){
        return view('content.home', self::$data);
    }
    
   public function boot($url){
       Content::getContent($url, self::$data);
       return view('content.boot', self::$data);
   }
    
}
