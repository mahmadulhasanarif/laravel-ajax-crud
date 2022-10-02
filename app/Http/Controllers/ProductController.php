<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ],
        [
            'name.required'=>'Please Enter a Product Name',
            'price.required'=>'Please Enter Product Price'
        ]);

        Product::insert([
            'name'=>$request->name,
            'price'=>$request->price,
            'created_at'=>Carbon::now()
        ]);

        return response()->json([
            'status'=>'success'
        ]);
    }

    public function update(Request $request)
    {
        Product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price,
            'updated_at'=>Carbon::now(),
        ]);

        return response()->json([
            'status'=>'success'
        ]);
    }

    public function delete(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }

    public function paginate(){
        $products = Product::latest()->paginate(5);
        return view('product.paginate', compact('products'));
    }

    public function search(Request $request){
        $products = Product::where('name',  'LIKE', '%'.$request->search.'%')
                    ->orwhere('price','%'.$request->search.'%')->orderBy('id', 'DESC')->latest()->paginate(5);
        if($products->count()>=1){
            return view('product.paginate', compact('products'));
        }else{
            return response()->json([
                'status'=>'success'
            ]);
        }
    }
}
