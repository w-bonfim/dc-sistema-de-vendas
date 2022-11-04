<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();

        return view('/admin/product/index', [
            'products' => $products
        ]);
    }

    public function create() 
    {
        return view('/admin/product/create');
    }

    public function store(Request $request) 
    {
        $products = new Product();
        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->is_active = $request->has('is_active') ? true : false;

        //upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) { 
            $folder = '/upload/products';
            $image_request = $request->image;
            $extension = $image_request->extension();
            $file_name = md5($image_request->getClientOriginalName() . strtotime('now') . '.' . $extension); 
            $image_request->move(public_path($folder), $file_name);
            $products->image =  $folder . '/' . $file_name;
        }

        $products->save();
     
        return redirect('/dashboard')->with('msg', 'Produto cadastrado com sucesso!');
    }

    public function edit() 
    {
        return view('/admin/product/edit');
    }

    public function sales() 
    {
        $sales = Sale::all();
        return view('/admin/product/sales/index', ['sales' => $sales]);
    }
}
