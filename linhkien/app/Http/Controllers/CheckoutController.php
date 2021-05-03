<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Models\Oder;
class CheckoutController extends Controller
{
    //
    public function index()
    {
        # code...
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data   = json_decode($cookie_data, true);
        $cart_data = json_decode($cookie_data) ;
        // echo gettype($cart_data) ."</br>";
        // echo $cart_data;
        // echo "id customer: ".Session::get('user')['ID_customer'].'</br>';
        $Id_customer = Session::get('user')['ID_customer'];
        // foreach ($cart_data as $item){
        //     $insertOrder = Oder::insert([
        //         'Id_order' => '',
        //         'Id_customer' => $Id_customer 
        //     ]);
        //     echo $item->item_quantity;
        // }

        return view("components.checkout", ['products'=>$cart_data]);
    }
    // public function checkout()
    // {
    //     # code...
    //     return view("components.checkout");
    // }
}
