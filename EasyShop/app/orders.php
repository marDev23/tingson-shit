<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\products;
use Storage;
use Image;

use Illuminate\Database\Eloquent\Model;

class orders extends Model {

    protected $fillable = ['total', 'status', 'reciept_img'];

    public function orderFields() {
        return $this->belongsToMany(products::class)->withPivot('qty', 'total');
    }

    public static function createOrder($filename) {

        // for order inserting to database
        $user = Auth::user();
        $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pending', 'reciept_img' => $filename]);


        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
        }
    }

}
