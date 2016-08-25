<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class Menu extends Model{
    public function contents() {

        return $this->hasMany('App\Content');
    }
    
    static public function addMenu($request){
        $menu = new self();
        $menu->link = $request['link'];
        $menu->title = $request['title'];
        $menu->url = $request['url'];
        $menu->save();
        Session::flash('sm', 'Nuevo menu fue agregado');
    }
    
    static public function updateMenu($request, $id){
        $menu = Menu::find($id);
        $menu->link = $request['link'];
        $menu->title = $request['title'];
        $menu->url = $request['url'];
        $menu->save();
        Session::flash('sm', 'El menu fue actualizado con exito');
 
    }
    static public function getMenuOrdered(&$data, $id){
        
        $sql = "SELECT * FROM menus ORDER BY CASE WHEN id = ? THEN 0 ELSE id END";
        $data['menu'] = DB::select($sql, [$id]);
       
    }
}
