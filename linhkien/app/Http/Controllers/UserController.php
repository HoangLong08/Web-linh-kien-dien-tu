<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomOrder;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    //
    public function index(){
        return view("components.login");
    }
    public function register(){
        return view("components.register");
    }
    public function actionRegister(Request $request){
        $pass = Hash::make($request->password);
        if($request->password !== $request->confirmPassword){
            return redirect()->back()->with('danger', "Mật khẩu không khớp");
        }else{
            $data = User::insert([
                'account' => $request->name,
                'password' => $pass,
                'gmail' => $request->email,
                'phone_number' => $request->phone,
                'province' => '',
                'district' => '',
                'commune' => '',
                'address' => '',
                'user_token' => ''
               
            ]);;
            // dd($request->all());
            // dd($data);
            return redirect()->back()->with('danger', "Đăng ký thành công");
        }
      
    }
    public function login(Request $request)
    {
        $res = $request->email . "  " . $request->password;
        // $data = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];
        $user = User::where(['gmail' => $request->email])->first();
        // $username = User::where(['name' => $request->email])->first();
        $res = "";
        if(!$user || !Hash::check($request->password, $user->password)){
            $res = "sai";
        }else{
           // if(Auth::guard('loyal_customer')->attempt($arr))
            $request->session()->put('user', $user);
            // Lưu giá trị và Session
            // return $user->name;
            $res =  "dung";   
        }
        // return dd($request->password);
        return $res;
        
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/');
    }

    public function profile()
    {
        $findCustomer = User::find(Session::get('user')['ID_customer']);
        return view("components.profile", ['user' => $findCustomer]);
        # code...
    }
    public function updateprofile(Request $request)
    {
        # code...
        User::where('ID_customer', Session::get('user')['ID_customer'])->
        update(array(
            'account' =>$request->account,
            'gmail' => $request->email,
            'phone_number' => $request->phone,
            'province' => $request->city,
            'district' => $request->quan,
            'commune' => $request->phuong,
            'address' => $request->thon
            
        ));
        return "success";
    }

    public function viewChangePassword()
    {
        # code...
        return view('components.changePassword');
    }
    public function updatePassword(Request $request)
    {
        # code...
        $passold = $request->passold;
        $resp = "fail";
        $user = User::where('ID_customer', Session::get('user')['ID_customer'])->first();
        if(Hash::check($passold, $user->password)){
            $resp = "success";
            User::where('ID_customer', Session::get('user')['ID_customer'])->
            update(array(
                'password' =>Hash::make($request->passnew),
            ));
        }else{
            $resp = "fail";
        }
        
        return $resp;
    }
    public function viewManagerOrder()
    {
        # code...
       
        $order = CustomOrder::join('orders', 'orders.Id_order', '=', 'customer_order.Id_order')->join('product', 'product.ID_product', '=', 'orders.Id_product')->where('Id_customer', Session::get('user')['ID_customer'])->get();
        
    
        // return view('components.managerOrder');

       
        return view('components.managerOrder', ['order' => $order]);
    }
}
