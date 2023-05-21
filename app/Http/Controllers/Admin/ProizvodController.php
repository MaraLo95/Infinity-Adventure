<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proizvod;
use Illuminate\Support\Facades\File;

class ProizvodController extends Controller
{
    public function index()
    {
        $proizvod = Proizvod::all();
        return view('admin/adminProizvodi', compact('proizvod'));
    }

    public function add()
    {
        return view('admin/addProizvod');
    }


    public function insert(Request $request)
    {
        $proizovd = new Proizvod();
       

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $fileInfo = pathinfo($file_name);
            $destinationPath = public_path('images/');
            $path = $request->file('image')->storeAs('public/images', $file_name);
        }
        
        $proizovd->name = $request->input('name');
        $proizovd->text = $request->input('text');
        $proizovd->price = $request->input('price');
        $proizovd->image = $file_name;
        $proizovd ->save();
        return redirect('adminProizvodi')->with('success','Uspešno ste dodali proizvod!');
    }

    public function delete($id){
        $proizvod = Proizvod::find($id);
        $dest = 'storage/images/'.$proizvod->image;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $proizvod->delete();
        return redirect()->back()->with('success', 'Proizvod je uspešno obrisan!');
}
}
