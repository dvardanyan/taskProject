<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function findProduct(Request $request){
        $request->validate([
            'data' => 'required'
        ]);
    	$name = $request->data;
        if(is_numeric($name))
        {
            $prod= Product::find($name);
        }
    	else
        {
            $prod = Product::where('name',$name)->first();
        }
        
        
    	return response()->json(['d'=>$prod]);
    }

    public function createProduct(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $product=new Product;
        $product->name=$request->name;
        $product->description=$request->description;
        $imageName=time().'.'.$request->file->getClientOriginalExtension();
    	$request->file->move(public_path('images'),$imageName);
        $product->image=$imageName;
    	$product->save();
    	return response()->json(['success'=>'you made new product']);
    }
}
