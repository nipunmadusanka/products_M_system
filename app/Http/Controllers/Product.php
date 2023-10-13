<?php

namespace App\Http\Controllers;

use App\Models\Product as Productmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Product extends Controller
{
    //
    public function index(){
        return view('pages.login.index');
    }

    public function userRegister(Request $request){
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required',
        ]);

        $add = new User();
        $add->name = $request->input('name');
        $add->email = $request->input('email');
        $add->password = Hash::make($request->input('password'));

        $add->save();

        return redirect('/')->with('success', 'user registration successful');
    }

    public function dashboard() {
        return view('pages.viewdata.viewdata');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('email','password');

        if(Auth::attempt($credential)){
            return redirect('/dashboard');
        }
        return redirect('/')->with('success', 'login failed');
    }

    public function addproduct(Request $request){
        $myID = Auth::id();
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
           ]);
           $imageName = time().'.'.$request->image->extension();
           $request->image->move(public_path('images'), $imageName);

           $pro = new Productmodel();
           $pro->uId = $myID;
           $pro->name = $request->input('name');
           $pro->description = $request->input('description');
           $pro->price = $request->input('price');
           $pro->image = $imageName;

           $pro->save();

           return redirect('/dashboard')->with('success', 'Added new Product successfully');
    }

    public function viewproduct(){
        $result = Productmodel::all();
        return view('pages.viewProducts.viewProducts', ['result' => $result]);
    }

    public function editProduct($id, Request $request){
        $data = $request -> validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $dbimage = DB::select('select image from products where id = ?',[$id]);
        foreach($dbimage as $img){
            $imageName = $img->image;
        };
        $imageempty = $request->image;

        if ( $imageempty == null ){

        }else{
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

        }

        $name = $request->input('name');
        $des = $request->input('description');
        $price = $request->input('price');

        $results = DB::update('update products set name = ?, description = ?, price = ?, image = ? where id = ?', [$name,$des,$price,$imageName,$id]);

        return redirect('/viewproduct')->with('success','Successfully update product');
    }

    public function destroyproduct(Productmodel $product){
        $product->delete();
        return redirect('/viewproduct')->with('success','Successfully delete product');
    }

    public function logout(){

        Session::flush();

        Auth::logout();

        return Redirect('/');
    }


}
