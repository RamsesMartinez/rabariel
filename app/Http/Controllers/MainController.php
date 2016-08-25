<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;

class MainController extends Controller
{
    static public $data = ['title' => 'RabAriel'];
    
    function __construct() {
        self::$data['menu'] = Menu::all()->toArray();
    }
}
