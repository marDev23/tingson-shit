<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\address;
use App\Province;

class ProfileController extends Controller {

    public function index() {
        $user = DB::table('users')
        ->where('id', '=', Auth::user()->id)
        ->get();
        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|digits:11'
        ]);

        DB::table('users')
        ->where('users.id', '=', Auth::user()->id)
        ->update(['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone]);

        return back()->with('msg', 'Profile Updated!');
    }

    public function orders() {
        $user_id = Auth::user()->id;
        $orders = DB::table('orders_products')
        ->leftJoin('products', 'products.id', '=', 'orders_products.products_id')
        ->leftJoin('orders', 'orders.id', '=', 'orders_products.orders_id')
        ->where('orders.user_id', '=', $user_id)
        ->orderBy('orders.created_at', 'DESC')
        ->get()
        ->groupBy('id');

        // dd($orders);
        
        return view('profile.orders', compact('orders'));
    }

    public function address() {
        $address_data = DB::table('address')
          ->where('address.user_id', '=', Auth::user()->id)
          ->leftJoin('locations', 'locations.id', '=', 'address.address_id')
          ->leftJoin('provinces', 'provinces.id', '=', 'locations.province_id')
          ->select('address.address_id', 'address.fullname', 'locations.city_mun', 'locations.baranggay', 'locations.zip', 'provinces.name')
          ->get();

          $provinces = Province::all();
        return view('profile.address', compact('address_data', 'provinces'));
    }

    public function updateAddress(Request $request) {
        // dd($request->fullname);
        $this->validate($request, [
            'fullname' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric'
        ]);

        DB::table('address')
        ->where('user_id', '=', Auth::user()->id)
        ->update(['fullname' => $request->fullname, 'address_id' => Auth::user()->id, 'address_id' => $request->city]);

        return back()->with('msg','Address Has Updated!');
    }

    public function saveAddress(Request $request) {
        $this->validate($request, [
            'fullname' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric'
        ]);

        $userid = Auth::user()->id;

        $address = new address;
        $address->user_id = $userid;
        $address->fullname = $request->fullname;
        $address->address_id = $request->city;
        $address->save();
        return back()->with('msg','Address Has Saved!');
    }

    public function Password() {
        return view('profile.updatePassword');
    }

    public function updatePassword(Request $request) {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;


        if(!Hash::check($oldPassword, Auth::user()->password)){
          return back()->with('msg', 'Password Does Not Match The In The Record'); //when user enter wrong password as current password

        }else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
           return back()->with('msg', 'Password Updated');
        }
       // echo 'here update query for password';
    }

    public function cancelOrdered($id) {
        DB::table('orders')->where('id', '=', $id)->update(['status' => 'canceled']);
        return back()->with('msg-cnl', 'Order Canceled!');
    }

}
