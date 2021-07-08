<?php

namespace App\Http\Controllers;

use App\Models\categoryproducts;
use App\Models\faq;
use App\Models\HomeModel;
use Illuminate\Http\Request;


class CategoryproductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta($slug);
        $name1 = $getmeta->title;
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $data = categoryproducts::getproduct($slug);
        $categories = HomeModel::getcategories();
        $cat_details =categoryproducts::getCategory($slug);
        if($cat_details){
            $img = $cat_details->cat_banner;
        }else{
            $img = false;
        }
        $prev_image = $prev_image = HomeModel::set_prev_image($img,$logo,$baseurl);
        return view('categoryProducts',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','data','cat_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sub_cat($slug)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta($slug);
        $name1 = $getmeta->title;
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $data = categoryproducts::getSubProduct($slug);
        $categories = HomeModel::getcategories();
        $cat_details =categoryproducts::getsubcategory($slug);
        if($cat_details){
            $img = $cat_details->sub_cat_img;
        }else{
            $img = false;
        }
        $prev_image = $prev_image = HomeModel::set_prev_image($img,$logo,$baseurl);
        return view('sub_category_product',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','data','cat_details'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta("Home");
        $name1 = "Shop";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $data = categoryproducts::getallproducts();
        $categories = HomeModel::getcategories();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('shop',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoryproducts  $categoryproducts
     * @return \Illuminate\Http\Response
     */
    public function show(categoryproducts $categoryproducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoryproducts  $categoryproducts
     * @return \Illuminate\Http\Response
     */
    public function edit(categoryproducts $categoryproducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoryproducts  $categoryproducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoryproducts $categoryproducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoryproducts  $categoryproducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryproducts $categoryproducts)
    {
        //
    }
}
