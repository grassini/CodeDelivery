<?php

use CodeDelivery\Models\Category;
use CodeDelivery\Models\Product;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('categories')->truncate();

        #para cada category criada crie tambem "each" X produtos
        factory(Category::class, 10)->create()->each(function ($c) {

            #Para cada categoria teremos 5 produtos relacionados
            for($i=0; $i<=4; $i++) {
                $c->products()->save(factory(Product::class)->make());
            }

        });
    }
}
