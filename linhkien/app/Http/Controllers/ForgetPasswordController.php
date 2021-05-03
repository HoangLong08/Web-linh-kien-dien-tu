<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
class ForgetPasswordController extends Controller
{
    //
    public function index()
    {
        # code...
        return view("components.forgetPassword");
    }
    public function forgetPassword(Request $request)
    {
        # code...
        $resultResquest = "";
        $email          = $request->email;
        $titleEmail     = "Lấy lại mật khẩu";
        $checkUserExist = User::where('gmail', $email)->first();
        // $userEmail      = User::where('email', '=',  $email)->get();
        //return dd($request->all());
       
        //echo (User::where('email', $email)->first());
        //echo( Str::random() ."\n");
        
        if(strlen($email) === 0){
            return redirect()->back()->with('danger', "Email không được để trống");
        }else{
            if(!$checkUserExist){ // khong co email
                // return redirect()->back()->with('danger', 'Email chưa đăng ký');
                $resultResquest = "EmailNotFound";
                return redirect()->back()->with('danger', "Email chưa được đăng ký");
            }
            else{
                // $2y$10$HO/aphPhZGgtr.Z4NtDjEeqeOWfoD2w6Pxps1N/BW7K6amDFCRaVK
                // 45638
                $resultResquest = "EmailFound";
                $tokenRandom = Str::random();
                $user = User::find($checkUserExist['ID_customer']);
                $user->user_token = $tokenRandom;
                $user->save();
                // return dd($user);
                // echo $user;
                $linkResetPass = url('/getpassword/updatepassword?email='.$checkUserExist['gmail'].'&token='.$tokenRandom);
                $data = [
                    'name' => $titleEmail,
                    'body' => $linkResetPass,
                    'email'=> $checkUserExist['gmail']
                ];
        
                Mail::send('components.contentmail', $data, function($message) use ($data, $titleEmail){
                    $message->from('longnguyen.080400@gmail.com', 'Nguyễn Võ Hoàng Long');
                    $message->to($data['email']);
                    $message->subject($titleEmail);
                });
               
                // return dd($data);
                return  redirect()->back()->with('danger', "Gửi mail thành công vui lòng vào email đặt lại mật khẩu");;
            }
        }
    }

    public function viewUpdatePassword(){

        return view('components.updatepassword');
    }
    public function updatePassword(Request $request){

        return dd($request->email);
    }
}
