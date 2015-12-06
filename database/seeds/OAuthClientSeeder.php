<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Category;
use CodeDelivery\Models\Product;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = date('Y-m-d G:h:i:s');
        \DB::insert(
            "insert into oauth_clients (id, secret, name, created_at, updated_at) values(?,?,?,?,?)",
                [
                    'appid01',
                    'secret',
                    'Minha App Mobile',
                    "$data",
                    "$data"
                ]);



//        factory(User::class)->create(
//            [
//                'id'      => 'appid01',
//                'secret'      => 'secret',
//                'name'     => 'Minha App Mobile',
//            ]
//        );

    }
}
