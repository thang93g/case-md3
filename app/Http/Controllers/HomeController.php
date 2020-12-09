<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('front-end.home');
    }

    public function showShop()
    {
        $categories = Category::all();
        $products = Product::all();
        $images = Image::all();
        return view('front-end.shop',compact(['categories','products','images']));
    }

    public function showBlog()
    {
        return view('front-end.blog');
    }

    public function showContact()
    {
        return view('front-end.contact');
    }

    public function showCheckOut()
    {
        $id = Auth::user()->id;
        $totalPrice = DB::table('carts')
            ->select(DB::raw('SUM(products.price * carts.quantity) as price'))
            ->join('products','products.id','=', 'carts.product_id')
            ->where('user_id','=',$id)
            ->get();
        return view('front-end.checkout',compact('totalPrice'));
    }
}
