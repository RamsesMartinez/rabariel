<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Categorie;
use App\Product;
use Session;

class ProductController extends MainController
{
    
     function __construct(){
        parent::__construct();
        $this->middleware('adminSigned');
    }
    
    public function index()
    {
        self::$data['products'] = Product::all()->toArray();
       return view('cms.product', self::$data); 
    }

    public function create()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.add_product', self::$data);
    }

    
    public function store(ProductRequest $request)
    {
      Product::addProduct($request);
      return redirect('cms/products');
    }

    public function show($id)
    {
        self::$data['product_id'] = $id;
        return view('cms.delete_product', self::$data);
    }

    
    public function edit($id)
    {
        self::$data['product'] = Product::find($id)->toArray();
        Categorie::getCategoryOrdered(self::$data, self::$data['product']['categorie_id']);
        return view('cms.edit_product', self::$data);
    }

   
    public function update(ProductRequest $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('cms/products');
    }

   
    public function destroy($id)
    {
       Product::destroy($id);
       Session::flash('sm', 'El producto fue eliminado');
       return redirect('cms/products');
    }
}
