<?php

namespace App\Http\Controllers;
use Auth;
use App\Product;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['cms']);
    }
    
    public function cms(){
         if(!Auth::check()){
            return redirect('/');
        }
        $products= Product::all();
        return view('cms.create', compact(['products']));
    }
    
    public function RemoveItem($id){
         if(!Auth::check()){
            return redirect('/');
        }
        $product = Product::find($id);
        $product->delete();
        return redirect('/cms');
    }
    
    public function UpdateItem($id){
        if(!Auth::check()){
            return redirect('/');
        }
        
        $product = Product::find($id);
        $product->title= request('title');
        $product->description= request('description');
        $product->price= request('price');
        $product->imagePath= request('imagepath');
        
        $product->save();
        return redirect('/cms');
    }
    
    public function AddItem(){
         if(!Auth::check()){
            return redirect('/');
        }
        
        $product= new Product;
        $product->id= request('id');
        $product->title= request('title2');
        $product->price= request('price2');
        $product->description= request('description2');
        $product->imagepath= request('imagepath2');

        $product->save();

        return redirect('/cms');
    }
}
