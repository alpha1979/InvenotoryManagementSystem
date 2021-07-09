<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //

    public function index(){

        $products = Product::all();
        //dd($products);
        
        return view('products.index')->with(
            [
               'products'=>$products,
            ]);
            
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        //dd($request, $request->title,$request->all());

        $validation_rules = [
            'title' => ['required','max:255'],
            'description'=>['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];
        $request->validate($validation_rules);
        $product = Product::create($request->all());
        if($request->stock == 0 && $request->status=='available'){
            // session()->put('error','if available stock cannot be 0');
            session()->flash('error','if available stock cannot be 0');
            return redirect()->back();
        }
        session()->flash('success',"You have succesfully created product title \" {$product->title} \" product");
        // session()->forget('error');
        return redirect()->route('products.index');
    }

    
    public function show($product){
        // $product = DB::table('products')->where('id',$product)->first();
        $product = Product::findOrFail($product);
        //dd($product);
        return view('products.show')->with([
            'product'=>$product
        ]);
    }

    public function edit($product){
        
        return view('products.edit')->with([
            'product'=>Product::findOrFail($product),
        ]);
    }

    public function update($product){
       
        $validation_rules = [
            'title' => ['required','max:255'],
            'description'=>['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];
        request()->validate($validation_rules);
        $product = Product::findOrFail($product);
        if(request()->stock == 0 && request()->status=='available'){
            // session()->put('error','if available stock cannot be 0');
            session()->flash('error','if available stock cannot be 0');
            return redirect()->back();
        }
        $product->update(request()->all());
       return redirect()->route('products.index');;
    }

    public function destroy($product){
        
        $product = Product::findOrFail($product);
        
        $product->delete();
        session()->flash('success',"You have succesfully deleted product id {$product->id}");
        return redirect()->route('products.index');
    }
}