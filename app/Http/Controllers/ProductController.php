<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function addProduct(){
        $categorys = category::all();
    
        return view('admin.addProduct', compact('categorys'));//categorys is variable

    }
    public function showProduct(){
        $products = product::all();
        return view('admin.showProduct',compact('products'));

    }
    public function deleteProduct($id){
        $data = product::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function editProduct($id){
        $categorys = category::all();
        $products=product::findorFail($id);


        return view('admin.editProduct',compact('products','categorys'));
    }
    public function updateProduct($id,Request $request){
        $update = product::find($id);
        $update->title=$request->title;
        $update->description=$request->description;
        $update->price=$request->price;
        $update->discount=$request->discount;
        $update->quantity=$request->quantity;
        $update->category=$request->category;
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $update->image=$imagename;
        }
        $update->save();
        return redirect()->back()->with('message','Product Updated Successfully');
        


            }
    public function storeProduct(Request $request){
       $product=new product;
       $product->title=$request->title;
       $product->description=$request->description;
       $product->price=$request->price;
       $product->discount=$request->discount;
       $product->quantity=$request->quantity;
       $product->category=$request->category;

       $name = $request ->image;
       $imagename=time().'.'.$name->getClientOriginalExtension();

       $request->image->move('product',$imagename);
       $product->image=$imagename;
       $product->save();



       return redirect()->back();
       

    }    

  
}
