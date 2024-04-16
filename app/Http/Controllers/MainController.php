<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Order;
use PhpParser\Node\Expr\New_;

class MainController extends BasketController
{
    public function index(){
        $categories1=Category::get();
        $products=Product::where('new',1)->paginate(4);




    return view('index',compact('categories1','products'));

    }


    public function categories(Request $request){
        $productsQuery = Product::query();
        // $products=Product::get();
        $categories1=Category::get();

        if ($request->filled('search_name')) {
            $productsQuery->where('name','like','%'. $request->search_name.'%');
        }

        $products=$productsQuery->paginate(8);





        return view('categories',compact('products','categories1'));

    }


    public function category($code){
        $category=Category::where('code', $code)->first();
        $categories1=Category::get();



         return view('category',compact('category','categories1'));

     }
     public function product($category, $product=null){
        $categories1=Category::get();

        $prodinfo=Product::where('code', $product)->first();
        $images=Image::where('product_id', $prodinfo)->first();



        return view('product',['product'=>$product], compact('categories1', 'prodinfo','images'));
    }

    //

}
//
