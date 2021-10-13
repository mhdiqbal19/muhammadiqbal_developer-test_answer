<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function getBestSelling(){
        $idBestSelling = OrderDetail::getIdBestSelling();
        $product = static::whereId($idBestSelling->product_id)->first();

        return [$product->name, $idBestSelling->countProductId];
    }

    public static function getMostUnsold($number){
        $idMostUnsold = OrderDetail::getIdMostUnsold($number);

        $ids = $idMostUnsold->pluck('product_id');

        $products = static::whereIn('id', $ids)->get();

        foreach ($products as $product){
            $product->countSold = $idMostUnsold->where('product_id', $product->id)->first();
        }

        return $products;

    }
}
