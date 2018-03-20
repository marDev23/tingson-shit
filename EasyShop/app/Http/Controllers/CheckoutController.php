<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Province;
use App\address;
use App\orders;
use Storage;
use Image;
use App\Location;

class CheckoutController extends Controller {

    public function index() {
          $profile_address = address::where('user_id', Auth::user()->id)->first();
          $provinces = Province::all();
          $cartItems = Cart::content();
          return view('front.checkout', compact(['cartItems', 'provinces', 'profile_address']));
          
       
    }

    public function formvalidate(Request $request) {
        $this->validate($request, [
            'reciept_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $file = $request->file('reciept_img');
        $filename = $file->getClientOriginalName();

        $path = base_path() . '/public/reciept/images';
        $file->move($path, $filename);

        $profile_address = address::where('user_id', Auth::user()->id)->get();
        if($profile_address->isEmpty()) {
        $this->validate($request, [
            'fullname' => 'required',
            'city' => 'required']);

        $userid = Auth::user()->id;

        $address = new address;
        $address->user_id = $userid;
        $address->address_id = $request->city;
        $address->payment_type = $request->pay;
        $address->save();

        orders::createOrder($filename);
        
        Cart::destroy();
        return redirect('thankyou');

       }
       else {
        orders::createOrder($filename);
        
        Cart::destroy();
        return redirect('thankyou');
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
        $p = Location::select('zip')->where('id', $request->id)->first();
        return response()->json($p);
    }

}
