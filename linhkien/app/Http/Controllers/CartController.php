<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use Prophecy\Argument\Token\AnyValuesToken;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
   //
   public function index()
   {
      $cookie_data = stripslashes(Cookie::get('shopping_cart'));
      $cart_data   = json_decode($cookie_data, true);
      // return dd($cart_data);
      return view('components.cart')->with('cart_data', $cart_data);
   }

   public function cartloadbyajax(){
      $totalcart = "";
      if (Cookie::get('shopping_cart')) {
         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
         $cart_data = json_decode($cookie_data, true);
         $totalcart = count($cart_data);
      } else {
         $totalcart = "0";
      }
      return json_encode(array('totalcart' => $totalcart));
   }
   private $tt;
   public function addToCart(Request $request){
      // $this->tt += $request->priceProduct;
      // echo $this->tt;
      // Cookie::queue(Cookie::forget('shopping_cart')); return ['ok' => true];
      
      $quantity = $request->quantity;
    
      // Cookie::forget('shopping_cart');
      // echo  $request->id;
      if (Cookie::get('shopping_cart')) {
         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
         $cart_data = json_decode($cookie_data, true);
      } else {
         $cart_data = array();
      }

      $item_id_list = array_column($cart_data, 'item_id');
      $prod_id_is_there = $request->id;
      // echo response()->json(['alo'=>$cart_data]);
      if (in_array($prod_id_is_there, $item_id_list)) {
        
         // echo "123: ".json_encode($cart_data)."  ".$request->id;
         foreach ($cart_data as $keys => $values) {
            // echo $values;
            if ($cart_data[$keys]["item_id"] == $request->id) {
               $cart_data[$keys]["item_quantity"] ++ ;
               if($cart_data[$keys]["item_quantity"] > $request->quantityProduct){
                  return "addFailure";
               }
               // echo "123";
               $item_data = json_encode($cart_data);
               $minutes = 60;
               // echo response()->json(['lao' => $cart_data]);
               Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
               return response()->json(['status' => '"' . $cart_data[$keys]["item_quantity"] . '" Already Added to Cart', 'status2' => '2']);
            }
         }
      } else {
         $products = Product::find($request->id);
         $prod_name = $products->name;
         $prod_image = $products->picture;
         $priceval = $products->price;
         $quantityProduct =  $request->quantityProduct;
         // $amountMoney +=  $products->price;
         if ($products) {
            $item_array = array(
               'item_id' => $products->ID_product,
               'item_name' => $prod_name,
               'item_quantity' => $quantity,
               'item_price' => $priceval,
               'item_image' => $prod_image,
               'item_amout_money' => 0,
               'item_quantity_product' => $quantityProduct
            );    

            $cart_data[] = $item_array;

            $item_data = json_encode($cart_data);
            $minutes = 60;
            // Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
            return response()->json(['status' => '"' . $prod_name . '" Added to Cart']);
         }
      }
   }

   public function changeQuantity(Request $request)
   {
      $cookie_data = stripslashes(Cookie::get('shopping_cart'));
      // echo ($cookie_data);
      
      $cart_data = json_decode($cookie_data, true);
      if ($request->changeTo === 'minus'){
         
         foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $request->id) {
               if($cart_data[$keys]["item_quantity"] > 1){
                  $cart_data[$keys]['item_quantity']--;
               
               }else{
                  unset($cart_data[$keys]);
                  
               }
               
            }
         }
        
      }else{
        
         foreach ($cart_data as $keys => $values) {
            
            if ($cart_data[$keys]["item_id"] == $request->id) {
               if($cart_data[$keys]["item_quantity"] < $cart_data[$keys]["item_quantity_product"]){
                  $cart_data[$keys]['item_quantity']++;
                 
               }else{
                  continue;
               }
               
            }
         }
         
      }
      $tt = 0;
      foreach ($cart_data as $keys => $values){
         $tt += $cart_data[$keys]["item_quantity"] * (int)$cart_data[$keys]["item_price"];
         $cart_data[$keys]["item_amout_money"] = $tt;
      }
      echo $tt;
     
      $item_data = json_encode($cart_data);
      Cookie::queue(Cookie::make('shopping_cart', $item_data, 60));
      // return response()->json(['alo'=>$cart_data]);
      // return "hello: ".$item_data;
      return ;
   }

  

   public function clearCartKth(Request $request)
   {

      $prod_id = $request->id;
      $cookie_data = stripslashes(Cookie::get('shopping_cart'));
      // echo ($cookie_data);

      $cart_data = json_decode($cookie_data, true);
      $item_id_list = array_column($cart_data, 'item_id');
      $prod_id_is_there = $prod_id;

      if (in_array($prod_id_is_there, $item_id_list)) {
         foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $prod_id) {
               unset($cart_data[$keys]);
               $item_data = json_encode($cart_data);
               $minutes = 60;
               Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
               return response()->json(['status' => 'Item Removed from Cart']);
            }
         }
      }
   }

   public function clearcart()
   {
      if (Cookie::get('shopping_cart')) {
         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
         $cart_data = json_decode($cookie_data, true);
         $totalcart = count($cart_data);
         Cookie::forget('shopping_cart');
      } else {
         $totalcart = "0";
      }
      // Cookie::queue(Cookie::forget('shopping_cart'));
      return response()->json(['status' => 'Your Cart is Cleared']);
   }
}
