<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BlogModel extends Model
{
    use HasFactory;

    public static function getblogs()
    {
        // code...
        $daata = DB::table("blog")
                ->paginate(4);
        return $daata;
    }

    public static function randomBlogs(){
        $data = DB::select("SELECT * FROM `blog` ORDER by rand() limit 6");
        return $data;
    }

    public static function blogdetails($slug)
    {
        // code...
        $daata = DB::table("blog")
                ->where("blog_slug",$slug)
                ->first();
        return $daata;
    }
}
