<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Middleware\StartSession;

class Helpers
{
	public static function getSubcategory($id){

		$data = DB::table("sub_category")
		->where("cat_id",$id)
		->get();
		return $data;
	}

	public static function getcategory_product($slug){

		$data = DB::select("SELECT * FROM `products`,categories WHERE products.product_cat = categories.cat_id AND categories.cat_slug='$slug' LIMIT 20");
		return $data;
	}

	public static function getpercentage($price,$prev_price){
		$percent = (((int)$prev_price - (int)$price)*100) /(int)$prev_price ;
		return ceil($percent);
	}

	public static function relatedProducts($id,$url){
		$new = DB::select("SELECT * FROM `products` where status = 'active' and product_cat = '$id' and product_slug!='$url' ORDER BY `product_id` DESC limit 7");
		return $new;
	}

	public static function mysql_escape($inp)
	{ 
		if(is_array($inp)) return array_map(__METHOD__, $inp);

		if(!empty($inp) && is_string($inp)) { 
			return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
		} 

		return $inp; 
	}

	public static function updatestock($pro_id,$qty){
		$data = DB::insert("UPDATE products SET stock = stock-'$qty' WHERE product_id = '$pro_id'");
	}

	public static function process_checkout($sql){
    $data = DB::insert($sql);
    return $data;
}

}

?>