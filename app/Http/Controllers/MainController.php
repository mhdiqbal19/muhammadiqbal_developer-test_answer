<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $productBestSelling = Product::getBestSelling();
        $customerPurchase = Customer::withCount('orders')->get();

        $mostUnsold = Product::getMostUnsold(5);


        return \view('index', \compact('productBestSelling', 'customerPurchase', 'mostUnsold'));
    }
}
