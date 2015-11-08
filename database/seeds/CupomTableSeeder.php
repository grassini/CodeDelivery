<?php

use CodeDelivery\Models\Cupom;
use Illuminate\Database\Seeder;

class CupomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('categories')->truncate();

        factory(Cupom::class, 10)->create();

    }
}
