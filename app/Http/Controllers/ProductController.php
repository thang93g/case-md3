<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('back-end.product.index',compact(['products','categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $product->image = 'uploads/'.$imageName;

        $imageName2 = time().'.'.$request->image2->extension();
        $request->image2->move(public_path('uploads2'), $imageName2);
        $product->image2 = 'uploads2/'.$imageName2;

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all());

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $product->image = 'uploads/'.$imageName;

        $imageName2 = time().'.'.$request->image2->extension();
        $request->image2->move(public_path('uploads2'), $imageName2);
        $product->image2 = 'uploads2/'.$imageName2;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('images')->where('product_id',$id)->delete();
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }

    public function getByCategory($id)
    {
        $categories = Category::all();
        $products = DB::table('products')->where('category',$id)->get();
        $images = Image::all();
        return view('front-end.shop',compact(['products','categories','images']));
    }

    public function search()
    {

    }
}
