<?php 
namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use DB;
use App\Quotation;

class ProductController extends Controller
{
    public function getIndex(Request $request){
        /*$products= Product::all();
        return view('shop.index', compact(['products'])); */
                        
        if(Input::get('taksinomisi')=='1'){
                $products = Product::where(function($query){
                $min_price = Input::has('min_price') ?  Input::get('min_price') : null;
                $max_price = Input::has('max_price') ? Input::get('max_price') : $max_price = null;
                $title= Input::has('title') ?  Input::get('title') : null;
                
                if(isset($min_price) && isset($max_price)){
                    $query-> where('price','>=',$min_price);
                    $query-> where('price','<=',$max_price);
                }
                if(isset($title)){
                    $query-> where('title','=',$title);
                }
            })->orderBy('price','asc')->paginate(6);
        }
        elseif(Input::get('taksinomisi')=='2'){
                $products = Product::where(function($query){
                $min_price = Input::has('min_price') ?  Input::get('min_price') : null;
                $max_price = Input::has('max_price') ? Input::get('max_price') : $max_price = null;
                $title= Input::has('title') ?  Input::get('title') : null;
                
                if(isset($min_price) && isset($max_price)){
                    $query-> where('price','>=',$min_price);
                    $query-> where('price','<=',$max_price);
                }
                if(isset($title)){
                    $query-> where('title','=',$title);
                }
            })->orderBy('price','desc')->paginate(6);
        }
        else{
            $products = Product::where(function($query){
            $min_price = Input::has('min_price') ?  Input::get('min_price') : null;
            $max_price = Input::has('max_price') ? Input::get('max_price') : $max_price = null;
            $title= Input::has('title') ?  Input::get('title') : null;
            
                if(isset($min_price) && isset($max_price)){
                    $query-> where('price','>=',$min_price);
                    $query-> where('price','<=',$max_price);
                }
                if(isset($title)){
                    $query-> where('title','=',$title);
                }
            })->paginate(6);
        }
        
        
        return view('shop.index', compact(['products']));
    
    }
    
     public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->back();
    }
    
    public function getCart() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
     public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect('/shopping-cart');
    }
    
    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect('/shopping-cart');
    }
    
    public function search(Request $request) {
        if ($request->ajax()){
           $products = DB::table('products')
                ->where('title','xbox one')
                ->paginate(3);
        
           return view('shop.index', compact(['products']))->render();
           //return response($products);
        }
    }
    
   
}
