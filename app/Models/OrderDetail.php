<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrderDetail extends Model
{
    use HasFactory;

    public static function getIdBestSelling(){
        $item = static::select(
            "product_id",
            DB::raw("count(product_id) as countProductId")
        )->groupBy("product_id")->orderBy('countProductId', 'desc')->first();

        return $item;
    }

    public static function getIdMostUnsold($number){
        $items = static::select(
            "product_id",
            DB::raw("count(product_id) as countProductId")
        )->groupBy("product_id")->orderBy('countProductId', 'asc')->limit($number)->get();

        return $items;
    }
}
