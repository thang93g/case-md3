<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function getProductImage($id)
    {
        $product = Product::find($id);
        $images = DB::table('images')->where('product_id',$id)->get();
        return view('back-end.product.details',compact(['images','product']));
    }

    public function store(Request $request,$id)
    {
        $image = new Image();
        $image->product_id = $id;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $image->image = 'uploads/'.$imageName;
        $image->save();
        return redirect()->route('product.index');
    }

    public function destroy($id,$imgid)
    {
        $image = Image::find($imgid);
        $image->delete();
        return redirect()->route('image.getProductImage',$id);
    }
}
