<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use DB;

class HomeModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = $getmeta->title;
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $featured_categories = HomeModel::getFeaturedcategories();
        $SingleLine = HomeModel::SingleLine();
        $banner = HomeModel::banner();
        $info_banner = HomeModel::info_banner();
        $best_selling = HomeModel::bestselling();
        $clients = HomeModel::clients();
        $randomgblogs = BlogModel::randomBlogs();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('welcome',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','featured_categories','SingleLine','banner','info_banner','best_selling','clients','randomgblogs'));
    }

    function about_us(){
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = $getmeta->title;
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $clients = HomeModel::clients();
        $prev_image = HomeModel::set_prev_image($info->about_img,$logo,$baseurl);
        return view('about',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','clients'));
    }

    

    function contact_us(){
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Contact Us";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $clients = HomeModel::clients();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('contact',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','clients'));
    }

    function terms(){
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Terms & Conditions";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $clients = HomeModel::clients();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('terms',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','clients'));
    }

    function Policy(){
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Privacy Policy";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $clients = HomeModel::clients();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('policy',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','clients'));
    }

    


    function mixed(){
        $new_arrivals = HomeModel::new_arrivals();
        $featured = HomeModel::featured();
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $view = view('layout.mixed',compact('new_arrivals','baseurl','currency','featured'))->render();
        return response()->json(['html'=>$view]);
    }

    function cat_dynamic(Request $request){
        $cat_data = DB::table('categories')
                    ->paginate(2);
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $view = view('layout.category_slider',compact('cat_data','baseurl','currency'))->render();
        return response()->json(['html'=>$view]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function show(HomeModel $homeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeModel $homeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeModel $homeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeModel $homeModel)
    {
        //
    }
}
