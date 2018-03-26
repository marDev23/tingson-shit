<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\address;
use App\orders;
use Storage;
use Image;
use App\Location;

class CheckoutController extends Controller {

    public function index() {
          $profile_address = DB::table('address')
          ->where('address.user_id', '=', Auth::user()->id)
          ->leftJoin('locations', 'locations.id', '=', 'address.address_id')
          ->leftJoin('provinces', 'provinces.id', '=', 'locations.province_id')
          ->select('address.address_id', 'address.fullname', 'locations.city_mun', 'locations.baranggay', 'locations.zip', 'locations.shipping_fee', 'provinces.name')
          ->get();
          // dd($profile_address);
          $provinces = Province::all();
          $cartItems = Cart::content();
          return view('front.checkout', compact(['cartItems', 'provinces', 'profile_address']));
          
       
    }

    public function formvalidate(Request $request) {
        $this->validate($request, [
            'reciept_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $fee = $request->shipping_fee;
        $file = $request->file('reciept_img');
        $filename = time() . '.' . $file->getClientOriginalName();

        $path = base_path() . '/public/reciept/images';
        $file->move($path, $filename);

        $profile_address = address::where('user_id', Auth::user()->id)->get();
        if($profile_address->isEmpty()) {
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
        $address->payment_type = $request->pay;
        $address->save();

        orders::createOrder($filename, $fee);
        
        Cart::destroy();
        return view('profile.thankyou');

       }
       else {
        $this->validate($request, [
            'fullname' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric'
        ]);

        DB::table('address')
        ->where('user_id', '=', Auth::user()->id)
        ->update(['fullname' => $request->fullname, 'address_id' => Auth::user()->id, 'address_id' => $request->city]);
        orders::createOrder($filename, $fee);
        
        Cart::destroy();
        return view('profile.thankyou');
       }
        
        
    }

    public function findlocation_mun(Request $request) {
        $data = Location::select('city_mun', 'id')->where('province_id', $request->id)->take(100)->get();
        return response()->json($data);
    }

    public function findlocation_bar(Request $request) {
        $data = Location::select('baranggay', 'id')->where('id', $request->id)->get();
        return response()->json($data);
    }

    public function findlocation_zip(Request $request) {
        $p = Location::select('zip', 'shipping_fee')->where('id', $request->id)->first();
        return response()->json($p);
    }

}
