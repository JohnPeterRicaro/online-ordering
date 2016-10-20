<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([

        	'imagePath'=>'',
        	'title'=>'',
        	'description'=>'',
        	'price'=>0

        	]);
        $product->save();
    }
}
