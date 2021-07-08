<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use App\Models\HomeModel;

class BlogModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = "Blog";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $blogs = BlogModel::getblogs();
        $randomBlogs = BlogModel::randomBlogs();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('blog',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','blogs','randomBlogs'));
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
        $getmeta = HomeModel::getmeta($slug);
        $name1 = "Blog";
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $blogs = BlogModel::blogdetails($slug);
        $randomBlogs = BlogModel::randomBlogs();
        $prev_image = $prev_image = HomeModel::set_prev_image($blogs->blog_image,$logo,$baseurl);
        return view('blog_details',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories','blogs','randomBlogs'));
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
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function show(BlogModel $blogModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogModel $blogModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogModel $blogModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogModel $blogModel)
    {
        //
    }
}
