<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class categoryproducts extends Model
{
    use HasFactory;

    public static function getproduct($slug){
        $data = DB::table("products")
                    ->join("categories","products.product_cat","=","categories.cat_id")
                    ->where("categories.cat_slug",$slug)
                    ->where("products.status","active")
                    ->paginate(12);
        return $data;
    }

    public static function getallproducts(){
        $data = DB::table("products")
                    ->where("products.status","active")
                    ->paginate(12);
        return $data;
    }

    public static function getSubProduct($slug){
        $data = DB::table("products")
                    ->join("sub_category","products.product_sub_cat","=","sub_category.sub_cat_id")
                    ->where("sub_category.sub_cat_slug",$slug)
                    ->where("products.status","active")
                    ->paginate(12);
        return $data;
    }

    public static function getCategory($slug){
        $data = DB::table("categories")
                    ->where("categories.cat_slug",$slug)
                    ->get();
        if($data){
            return $data[0];
        }else{
            return false;
        }
    }

    public static function getsubcategory($slug){
        $data = DB::table("sub_category")
                    ->where("sub_category.sub_cat_slug",$slug)
                    ->first();
        return $data;
    }
}
