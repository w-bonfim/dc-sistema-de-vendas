<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $products = Product::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $products = Product::all();
        }        
    
        return view('welcome', ['products' => $products, 'search' => $search]);
    }

    public function show($id)
    {
        $product = Product::whereId($id)->first();
      
        return view('finalize', ['product' => $product]);
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $sale = new Sale();
            $sale->seller = 'Teste';
            $sale->pay = $request->pay;
            $sale->amount_portion =  $request->amount_portion;
            $sale->price = $request->price;
            $sale->product = $request->product;

            $sale->save();

            return redirect('/')->with('msg', 'Pagamento realizado com sucesso!');
        }

        return redirect('/')->with('not_msg', 'Compra não realizada! O vendedor responsável não está autenticado, por favor tente novamente mais tarde.');
    }
}
