<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $orders = Order::all();

        foreach ($orders as $order){
            $random = rand(1, 5);

            for ($i=0; $i <= $random  ; $i++) {
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'product_id' => Product::all()->random()->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

    }
}
