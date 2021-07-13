<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function store(ProductRequest $request, Product $product){
        //dd($request, $request->title,$request->all());

        // $validation_rules = [
        //     'title' => ['required','max:255'],
        //     'description'=>['required','max:1000'],
        //     'price' => ['required','min:1'],
        //     'stock' => ['required','min:0'],
        //     'status' => ['required','in:available,unavailable'],
        // ];
        // $request->validate($validation_rules);
        // 
        // if($request->stock == 0 && $request->status=='available'){
            
        //     return redirect()->back()
        //                     ->withInput(($request->all()))
        //                     ->withErrors('if available stock cannot be 0');
        // }
        $product = Product::create($request->validated());
        return redirect()->route('products.index')
                        ->withSuccess("You have succesfully created product title \" {$product->title} \" product");
    }

    
    public function show(Product $product){
        // $product = DB::table('products')->where('id',$product)->first();
        // $product = Product::findOrFail($product);
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

    public function update(ProductRequest $request, Product $product){
       
       $product->update($request->all());
       return redirect()->route('products.index')
                        ->withSuccess("You have succesfully Updated product title \" {$product->title} \" product");;
    }

    public function destroy(Product $product){
        
        // $product = Product::findOrFail($product);
        
        $product->delete();
        // session()->flash('success',"You have succesfully deleted product id {$product->id}");
        return redirect()->route('products.index')
                        ->withSuccess("You have succesfully deleted product id {$product->id}");
    }
}