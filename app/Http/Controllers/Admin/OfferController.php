<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
class OfferController extends Controller
{
    

    public function index(){
        $offer = Offer::all();
        return view('admin/adminOffer',compact('offer'));
    }
    public function add(){
        $products = Product::all();
        $min = Date::now();        
        return view('admin/addOffer',compact('products','min'));
    }


    public function insert(Request $request)
    {
        $offer = new Offer();
       

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $fileInfo = pathinfo($file_name);
            $destinationPath = public_path('images/');
            $path = $request->file('image')->storeAs('public/images', $file_name);
        }
        
        $offer->name = $request->input('name');
        $offer->text = $request->input('text');
        $offer->description = $request->input('description');
        $offer->price = $request->input('price');
        $offer->image = $file_name;
        $services = $request->input('checked');
        $offer->dateStart = $request->input('dateStart');
        $offer->dateEnd = $request->input('dateEnd');
        $servicess = json_encode($services);
        $offer->services = $servicess;
        $offer ->save();
        return redirect('adminOffer')->with('success','Uspešno ste dodali paket!');
    }

    public function delete($id){
        $offer = Offer::find($id);
        $dest = 'storage/images/'.$offer->image;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $offer->delete();
        return redirect()->back()->with('success', 'Paket je uspešno obrisan!');
}


  public  function viewOne($id){
    $offer = Offer::find($id);
    return view('pages/viewOffer',compact('offer'));
  }
}
