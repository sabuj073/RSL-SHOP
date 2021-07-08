<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;

class ProductModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $data = ProductModel::getProductDetails($id);
        $view = view('layout.modal',compact('data','baseurl','currency'))->render();
        return response()->json($view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($slug)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = $getmeta->title;
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $data = ProductModel::getProductDetailsBySlug($slug);
        $categories = HomeModel::getcategories();
        $prev_image = HomeModel::set_prev_image($data->product_image,$logo,$baseurl);
        return view("product_details",compact('info','logo','name1','description1','baseurl','currency','data','prev_image','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Cart";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $delivery_charge = ProductModel::getDeliveryCharge();
        $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view("cart",compact('info','logo','name1','description1','baseurl','currency','prev_image','categories','delivery_charge'));
    }

    public function checkout(Request $request)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Checkout";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $delivery_charge = ProductModel::getDeliveryCharge();
        $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view("checkout",compact('info','logo','name1','description1','baseurl','currency','prev_image','categories','delivery_charge'));
    }


     public function wishlist(Request $request)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Wishlist";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view("wishlist",compact('info','logo','name1','description1','baseurl','currency','prev_image','categories'));
    }

    public function order_complete($id){
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Order Complete";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $order_details = ProductModel::getorderdetails($id);
        $details = ProductModel::getorderdetails_with_product($id);
        $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view("order_complete",compact('info','logo','name1','description1','baseurl','currency','prev_image','categories','order_details','details'));
    }

    public function passcart(Request $request){
        $data = $request['data'];
        $dtype = $request['dtype'];
        $dcharge = $request['dcharge'];
        $data = json_decode($data);
        $cart = array();
        $dc = ProductModel::getDeliveryCharge();
        foreach($data as $row){
            array_push($cart, array('id' => $row->id,
                                     'price' => $row->price,
                                     'quantity' => ProductModel::solveQuantity($row->id,$row->quantity),
                                     'label'=>$row->label,
                                     'stock'=>ProductModel::getQuantity($row->id),
                                     'image'=>$row->image,
                                     'slug'=>$row->slug
                                 ));
        }
        \Session::put('rsl_express_shop', $cart);
        \Session::put('dc_data', ['dt'=>$dtype,'dc' => $dcharge]);
        $array = array("cart"=>$cart, "inside"=>$dc->charge, "outside"=>$dc->outside);
        return json_encode($array);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $productModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $productModel)
    {
        //
    }
}
