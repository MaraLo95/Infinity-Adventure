<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Proizvod;
use App\Models\Offer;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{


    public function index(){
        $products = Product::all();
        return view('admin/adminServices', compact('products'));
    }

    

    public function addServices(){
        return view('admin/addServices');
    }

    public function insert(Request $request)
    {
        $products = new Product();
       

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $fileInfo = pathinfo($file_name);
            $destinationPath = public_path('images/');
            $path = $request->file('image')->storeAs('public/images', $file_name);
        }
        
        $products->title = $request->input('title');
        $products->text = $request->input('text');
        $products->description = $request->input('description');
        $products->image = $file_name;
        $products->price = $request->input('price');
        $products ->save();
        return redirect('adminServices')->with('success','Uspešno ste dodali uslugu!');
    }

    public function adminGallery(){
        $images = Product::all();
        $proizvodi = Proizvod::all();
        $offer = Offer::all();
        return view('admin/adminGallery', compact('images','proizvodi','offer'));
    }


    public function deleteProduct($id){
            $product = Product::find($id);
            $dest = 'storage/images/'.$product->image;
            if(File::exists($dest)){
                File::delete($dest);
            }
            $product->delete();
            return redirect()->back()->with('success', 'Product has been deleted');
    }

    public function indexUser(){
        $products = Product::all();
        $offer = Offer::all();
        return view('pages/services', compact('products','offer'));
    }

}
