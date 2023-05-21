<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin/adminUser', compact('users'));
    }
    public function deleteUser($id){
    if(Auth::user()->id == $id){
        return redirect()->back()->with('warning', 'You are not allowed to delete yourself');
    }
    $user = User::whereId($id)->delete();
    return redirect()->back()->with('success', 'User has been deleted');
}
    public static  function dateDiffInDays($date1) 
    {
        $dateAsString = date('Y-m-d'); // 2020-01-02
    $diff = strtotime($dateAsString) - strtotime($date1);
    return abs(round($diff / 86400));
    }
    
    public function viewAdmin($id){
        if(Auth::user()->id == $id){
            $users = User::all();
        return view('admin/adminProfile', compact('users'));
        }
    }
}

