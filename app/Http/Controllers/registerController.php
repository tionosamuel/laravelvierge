<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{

  public function adminregister(){
    return view('admin');
  }
  public function home(){
    $products = Product::latest()->paginate(5);

    return view('home',compact('products'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
  }
 //administrateur
   public function adminStore(Request $request){
 $request->validate([
    'lastname' =>['required'],
    'firstname' =>['required'],
    'email' =>['required','email'],
    'password' =>['required'],
    'phone_number' =>['required'],


   ]);
   
     User::create([
    'lastname' =>$request->lastname,
    'firstname' =>$request->firstname,
    'email' =>$request->email,
    'phone_number' =>$request->phone_number,
    'password' => Hash::make($request->password),
    'role_id' => 1
     ]);
     return view('login');
  }


//por le gerant
  public function managerregister(){
    return view('manager');
  }
  public function managerStore(Request $request){
    $request->validate([
       'lastname' =>['required'],
       'firstname' =>['required'],
       'email' =>['required','email'],
       'password' =>['required'],
       'phone_number' =>['required'],
   
   
      ]);
      
        User::create([
       'lastname' =>$request->lastname,
       'firstname' =>$request->firstname,
       'email' =>$request->email,
       'phone_number' =>$request->phone_number,
       'password' => Hash::make($request->password),
       'role_id' => 2
        ]);

        return view('login');
     }


//pour le client
     public function clientregister(){
      return view('client');
    }
   
     public function clientStore(Request $request){
      $request->validate([
         'lastname' =>['required'],
         'firstname' =>['required'],
         'email' =>['required','email'],
         'password' =>['required'],
         'phone_number' =>['required'],
     
     
        ]);
        
          User::create([
         'lastname' =>$request->lastname,
         'firstname' =>$request->firstname,
         'email' =>$request->email,
         'phone_number' =>$request->phone_number,
         'password' => Hash::make($request->password),
         'role_id' => 3
          ]);
          return view('login');
       }
}
