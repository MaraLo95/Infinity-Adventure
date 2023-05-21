<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class SessionController extends Controller
{
   public function get(Request $request) {
      if($request->session()->has('user'))
         echo $request->session()->get('user');
      else
         echo 'Sesija ne postoji!';
   }
   public function set(Request $request) {
      $request->session()->put('user','Marko');
      echo "Uspesno ste dodali u sesiju!";
   }
   public function delete(Request $request) {
      $request->session()->forget('user');
      echo "Sesija je obrisana!";
   }
}

