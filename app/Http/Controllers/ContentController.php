<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContentRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Menu;
use App\Content;
use Session;

class ContentController extends MainController
{
    
     function __construct(){
        parent::__construct();
        $this->middleware('adminSigned');
    }
    
    public function index()
    {
        self::$data['content'] = Content::all()->toArray();
       return view('cms.content', self::$data); 
    }

    public function create()
    {
        return view('cms.add_content', self::$data);
    }

    
    public function store(ContentRequest $request)
    {
      Content::addContent($request);
      return redirect('cms/content');
    }

    public function show($id)
    {
        self::$data['content_id'] = $id;
        return view('cms.delete_content', self::$data);
    }

    
    public function edit($id)
    {
        
        
        self::$data['content'] = Content::find($id)->toArray();
        Menu::getMenuOrdered(self::$data, self::$data['content']['menu_id']);
        return view('cms.edit_content', self::$data);
    }

   
    public function update(ContentRequest $request, $id)
    {
        Content::updateContent($request, $id);
        return redirect('cms/content');
    }

   
    public function destroy($id)
    {
       Content::destroy($id);
       Session::flash('sm', 'El contenido fue eliminado');
       return redirect('cms/content');
    }
}
