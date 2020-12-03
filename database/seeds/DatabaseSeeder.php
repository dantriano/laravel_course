<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
    }
}

class ProductSeeder extends Seeder
{
    public function run(){
        DB::table('products')->insert(['name' => 'Product 1','type' => 'comida', 'desc' => 'Esto es la descripcion','price'=>10.02]);
        DB::table('products')->insert(['name' => 'Product 2', 'type' => 'bebida', 'desc' => 'Esto es la descripcion2','price'=>20.02]);
        DB::table('products')->insert(['name' => 'Product 3', 'type' => 'bebida', 'desc' => 'Esto es la descripcion2','price'=>10.02]);
    }
}