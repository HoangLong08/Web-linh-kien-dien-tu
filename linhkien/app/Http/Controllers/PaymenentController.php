<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\CustomOrder;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;
class PaymenentController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('components.payment');
    }

    public function payment(Request $request)
    {
        # code...
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data   = json_decode($cookie_data, true);
        $cart_data = json_decode($cookie_data) ;
        $Id_customer = Session::get('user')['ID_customer'];
        $tmp = $Id_customer.(rand(1000,9999));
        $lastupdated = date('Y-m-d H:i:s');
        $insertCustomerOrder = CustomOrder::insert([
            
            'Id_customer' => $Id_customer ,
            'Id_order'    => $tmp,
            'Date_order'  => $lastupdated,
            'status'      => 'Đang đóng gói',
            'name'        => $request->name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'tinh'        => $request->city,
            'quan'        => $request->quan,
            'xa'          => $request->phuong,
            'thon'        => $request->thon,
        ]);
        foreach ($cart_data as $item){
            // echo $item->item_id . '</br>';
            // echo $item->item_quantity . '</br>';
            $insertOrders = Orders::insert([
                
                'Id_order' => $tmp,
                'Id_product' => $item->item_id,
                'quantity' => $item->item_quantity,
                'total_money' => $item->item_quantity * $item->item_price
            ]);
        }
        // echo "da inssert vào db";
        return view('components.payment');
    }
}
