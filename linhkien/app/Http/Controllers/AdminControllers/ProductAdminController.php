<?php

namespace App\Http\Controllers\AdminControllers;

// use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use Cloudinary\Cloudinary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductAdminController extends Controller
{
    //
    public function product(){
        $data = Product::paginate(12);
        return view('Admin.components.listproduct', ['products' => $data]);
    }
    public function deleteProduct(Request $request)
    {
        # code...
        $product = Product::find($request->idProduct)->delete();
        if($product){
            return "success";
        }else{
            return "fail";
        }
    }
    public function editProduct($id)
    {
        # code...
        $data  = Product::find($id);
        return view('Admin.components.editProduct', ['product' => $data]);
    }

    public function updateProduct(Request $request)
    {
        # code...
        $product = Product::where('ID_Product',$request->ID_Product)
                ->update(array( 'name'=>$request->name, 'price' => $request->price, 'classify' => $request->classify, 'company' => $request->company, 'picture' => $request->picture));
        if($product){
            return redirect()->back()->with('danger', "Cập nhật thành công");
        }else{
            return redirect()->back()->with('danger', "Cập nhật thất baị");
        }
        // return  dd($request->all());
    }

    public function viewAddProduct()
    {
        # code...
        return view('admin.components.addProduct');
    }
    public function addProduct(Request $request)
    {
        # code...
        $input = $request->all();

        $input['picture'] = time().'.'.$request->picture->extension();
        $name = "";
        $path = "";
        // if($request->hasFile('picture')){
            // $res = $request->picture->guessExtension(); // duoi file
            // // $res = $request->picture->getMimeType();
            // // $res = $request->picture->guessClientExtension();
            // // $res = $request->picture->getSize();
            // $name = $request->picture->getClientOriginalExtension();
            // // $path = $request->picture->storeAs('public/asset/img', $name);
            
        // }
       
        require '../vendor/cloudinary/cloudinary_php/src/Cloudinary.php';
        require '../vendor/cloudinary/cloudinary_php/src/Uploader.php';
      
        $cloudUpload = \Cloudinary\Uploader::upload($request->file('picture'));
       
        $image = $request->file('picture');
        $newImg = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('public/asset/img'), $newImg);
        // $cloudinary = new Cloudinary();

        
            Product::insert([
                'name' => $request->name,
                'price' => $request->price,
                'classify' => $request->classify,
                'company' => $request->company,
                'picture' =>$cloudUpload['url']
            ]);
        // return dd($cloudUpload['url'])  ;
            
        return response()->json([
            'message' => 'Image Upload Success',
            'upload_image' => '<img src="/public/asset/img/'.$newImg.'" class="img-responsive">',
            'all' => $request->all()
        ]);
    }
}
