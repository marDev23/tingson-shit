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

class CheckoutController extends Controller {

    public function index() {
          $profile_address = address::where('user_id', Auth::user()->id)->first();
          $provinces = Province::all();
          $cartItems = Cart::content();
          return view('front.checkout', compact(['cartItems', 'provinces', 'profile_address']));
          
       
    }

    public function formvalidate(Request $request) {
        $file = $request->file('reciept_img');
        $filename = $file->getClientOriginalName();

        $path = base_path() . '/public/reciept/images';
        $file->move($path, $filename);

        $profile_address = address::where('user_id', Auth::user()->id)->get();
        if($profile_address->isEmpty()) {
        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'pincode' => 'required|numeric',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:25',
            'country' => 'required']);

        $userid = Auth::user()->id;

        $address = new address;
        $address->fullname = $request->fullname;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->country = $request->country;

        $address->user_id = $userid;
        $address->pincode = $request->pincode;
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

}
