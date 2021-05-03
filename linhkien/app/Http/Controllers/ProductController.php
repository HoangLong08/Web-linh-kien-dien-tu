<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\DetailProduct;


class ProductController extends Controller
{
    //
    public function index(){
        // dd($request);
        try {
            // DB::connection();
            // laravel eloquent
            if(DB::connection()) {
                // connection is made
                // $data = DB::select("select * from product");
                $data = Product::paginate(12);
                // $data = Product::all();
                return view('components.home', ['products' => $data]);
            }else{
                return view("components.errorConnectDb");
            }
        } catch (\Exception $e) {
            return view("components.errorConnectDb");

            // die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
        
       // return DB::select("select * from products");
    }
    public function detail( $id)
    {
        // Update details Set details.picture = (Select product.picture From product WHERE product.ID_product = details.ID_product) 
        $data  = Product::find($id);
        $data1 = DetailProduct::find($id);
        $data2 = DB::select("select * from product where classify = '$data->classify' LIMIT 10");
        // return dd($data2);
        //return $data;
        return view('components.detail', ['product' => $data, 'productDetail' => $data1], ['productSame' => $data2] );
    }
    
    public function sort(Request $request)
    {
        $data = "";
        //return $data;

        if($request->tmp  === "priceAsc"){
            $data = Product::where('name', 'like', $request->productSearch.'%')->orWhere('classify', 'like', $request->productSearch.'%')->orderBy('price', 'asc')->get();
            // return view('components.listproduct', ['products' => $data]);
        }else{
            if($request->tmp  === "priceDesc"){
                $data = Product::where('name', 'like', $request->productSearch.'%')->orWhere('classify', 'like', $request->productSearch.'%')->orderBy('price', 'desc')->get();
                // return view('components.listproduct', ['products' => $data]);
            }else{
                if($request->tmp  === "laptop"){
                    $data = Product::where('classify', 'like', '%LAP%')->get();
                    // return view('components.listproduct', ['products' => $data]);
                }else{
                    if($request->tmp  === "dienthoai"){
                        $data = Product::where('classify', 'like', '%ĐIỆN%')->get();
                        // return view('components.listproduct', ['products' => $data]);
                    }else{
                        if($request->tmp  === "dongho"){
                            $data = Product::where('classify', 'like', '%ĐỒNG%')->get();
                            // return view('components.listproduct', ['products' => $data]);
                        }
                    }
                }
            }
        }
        // echo $request->productSearch;
        // echo $data;
        // echo $data;
        return  view('components.listproduct', ['products' => $data]);
        // return ;
    }

    public function search(Request $request){
        // composer dump-autoload 
        // $request = $_GET['keyword'];
        // echo $request->brand;
        // $res = ConverSearchPro($request->keyword);
        $res = $request->keyword;
        // echo $res;
        $products = "";
        if($res){
            $products = Product::where('name', 'like', '%'.$res.'%')->orWhere('classify', 'like','%'. $res.'%')->get();
            $arr = (array)$products;
            if( $arr ){
                $longHoang = explode(" ", $res);
                foreach($longHoang as $item){
                    $products = Product::where('name', 'like', '%'.$item.'%')->orWhere('classify', 'like','%'. $item.'%')->get();
                    $arr1 = (array)$products;
                    if( !$arr1 ){
                        break;
                    }
                }
            }
        }
        // $products = Product::paginate(16);
        // if($request->brand === "asc"){
        //     $products = Product::where('name', 'like', '%'.$request->keyword.'%')->orWhere('classify', 'like', '%'.$request->keyword.'%')->orderBy('price', 'asc')->get();
        //     // return "asc";
        // }
        return view('components.search', ['products'=>$products]);
        // return ;
        // return dd($request->all());
    }

}

