<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{
    use HasFactory;

    public static function getlogo(){
     $logo = DB::table("logo")
            ->get();
     return $logo[0];
 }

 public static function getinfo(){

       $data =  DB::table('info')
                ->get();
       return $data[0];
   }

 public static function getcategories(){

       $data =  DB::table('categories')
                ->where("status","1")
                ->get();
       return $data;
}

public static function getFeaturedcategories(){

       $data =  DB::table('categories')
                ->where("status","1")
                ->where("featured","1")
                ->get();
       return $data;
}

public static function SingleLine(){
    $data = DB::table("single_line_banner")->get();
    return $data[0];
}

public static function banner(){
    $data = DB::table("main_banner")->get();
    return $data;
}


public static function imageBase(){
    return "https://res.cloudinary.com/techdyno-bd/image/upload/";
}

public static function currency(){
    return "৳";
}

public static function info_banner(){
    $data = DB::table("info_banner")->get();
    if(count($data)>0){
        return $data[0];
    }else{
        return false;
    }
}

public static function clients(){
    $data = DB::table("brands")->get();
    return $data;
}

public static function new_arrivals(){
    $data = DB::table("products")
                ->Where("status","active")
                ->orderBy("product_id","DESC")
                ->skip(0)->take(10)
                ->get();
    return $data;
}

public static function featured(){
    $data = DB::table("products")
                ->Where("status","active")
                ->where("discount","1")
                ->orderBy("product_id","DESC")
                ->skip(0)->take(10)
                ->get();
    return $data;
}

public static function bestselling(){
    $data = DB::select("SELECT *,order_products.product_id,sum(qty) qty FROM products,order_products WHERE products.product_id = order_products.product_id GROUP BY order_products.product_id ORDER BY qty DESC limit 10");
    return $data;
}

public static function getmeta($slug){
        $meta = DB::table("metatag")
                    ->where("meta_id",$slug)
                    ->get();
        if(count($meta)==0){
            $meta = DB::table("metatag")
                    ->where("meta_id","home")
                    ->get();
            return $meta[0];

        }else{
            return $meta[0];
        }

    }

public static function set_prev_image($image1,$logo,$baseurl){
        if(isset($image1)){
            $prev_image = $baseurl."c_scale,w_154/".$image1;
        }else{
            $prev_image = $baseurl.$logo->logo_img;
        }
        return $prev_image;
    }

}
