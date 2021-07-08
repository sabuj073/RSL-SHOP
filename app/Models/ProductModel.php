<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProductModel extends Model
{
    use HasFactory;

    public static function getProductDetails($id){
        $data = DB::table('products')
                ->where("product_id",$id)
                ->first();
        return $data;
    }

     public static function getProductDetailsBySlug($slug){
        $data = DB::table('products')
                ->where("product_slug",$slug)
                ->first();
        return $data;
    }

    public static function getDeliveryCharge(){
        $data = DB::table('delivery_charge')
                ->first();
        return $data;
    }

    public static function solveQuantity($id,$qty){
        $data = self::getProductDetails($id);
        if($qty>$data->stock){
             return $data->stock;
        }else{
            return $qty;
        }
        
    }

    public static function getQuantity($id){
        $data = self::getProductDetails($id);
        return $data->stock;
    }

    public static function getorderdetails($id){
        $data = DB::table("orders_info")
                ->where("order_id",$id)
                ->first();

        return $data;
    }

    public static function getorderdetails_with_product($id){
        $data = DB::table("orders_info")
                ->join("order_products","orders_info.order_id","=","order_products.order_id")
                ->join("products","order_products.product_id","=","products.product_id")
                ->where("orders_info.order_id",$id)
                ->get();
        return $data;
    }

}
