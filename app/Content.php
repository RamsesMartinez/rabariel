<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model{
        static public function getContent($menu_url, &$data) {
        
        $data['contents'] = [];
        
        if ($menu = Menu::where('url', '=', $menu_url)->first()) {
            
            $menu = $menu->toArray();
            $data['title'] = $menu['title'];
           
            
            if ($contents = Menu::find($menu['id'])->contents)
                    {
                $data['contents'] = $contents->toArray();
                
            }
        }
    }
    
    static public function addContent($request){
        $content = new self();
        $content->menu_id = $request['menu'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'Nuevo contenido fue agregado');
    }
    
     static public function updateContent($request, $id){
        $content = Content::find($id);
        $content->menu_id = $request['menu'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'El contenido fue actualizado');
 
    }
    
    
}
