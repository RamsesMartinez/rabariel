<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class Categorie extends Model {

    public function products() {

        return $this->hasMany('App\Product');
    }
    
    static public function addCategory($request){
        
        $image_name = 'default.jpg';
        
        if ($request->hasFile('image') && $request->file('image')->isValid()){
         $image_name = str_random(5) . date('y.m.d.H.i.s') . str_random(5) . '.' . $request->file('image')->getClientOriginalExtension();   
         $request->file('image')->move( public_path(). '/images', $image_name);
                 
        }
        
        $category = new self();
        $category->title = $request['title'];
        $category->article = $request['article'];
        $category->url = $request['url'];
        $category->image = $image_name;
        $category->save();
        Session::flash('sm', 'Una nueva categoria fue agregada');
    }
    
    static public function updateCategory($request, $id){
        
        $image_name = '';
        
        if ($request->hasFile('image') && $request->file('image')->isValid()){
         $image_name = str_random(5) . date('y.m.d.H.i.s') . str_random(5) . '.' . $request->file('image')->getClientOriginalExtension();   
         $request->file('image')->move( public_path(). '/images', $image_name);
                 
        }
        
        $category = Categorie::find($id);
        $category->title = $request['title'];
        $category->article = $request['article'];
        $category->url = $request['url'];
        if($image_name){
            $category->image = $image_name;
        }
        $category->save();
        Session::flash('sm', 'La categoria fue actualizada');
      
    }

     static public function getCategoryOrdered(&$data, $id){
        
        $sql = "SELECT * FROM categories ORDER BY CASE WHEN id = ? THEN 0 ELSE id END";
        $data['categories'] = DB::select($sql, [$id]);
       
    }
    
}
