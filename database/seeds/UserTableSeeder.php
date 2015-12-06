<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\User;
use CodeDelivery\Models\Client;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Criando um Usário Especifico COMUM
        factory(User::class)->create(
            [
                'name'      => 'Jefferson',
                'email'     => 'grassini@ig.com.br',
                'password'  => bcrypt(123456),
                //'role'      => 'client',
                'remember_token' => 'str_random(10)'
            ]
        )->client()->save(factory(Client::class)->make());

        #Criando um Usário Especifico ADMIN
        factory(User::class)->create(
            [
                'name'      => 'Admin',
                'email'     => 'admin@user.com',
                'password'  => bcrypt(123456),
                'role'      => 'admin',
                'remember_token' => 'str_random(10)'
            ]
        )->client()->save(factory(Client::class)->make());


        #A cada user, criando tb dados para clientes
        factory(User::class, 10)->create()->each(function ($u) {
            $u->client()->save(factory(Client::class)->make());

        });


        #Criando Delivery Man
        factory(User::class, 3)->create(
            [
                'role'      => 'deliveryman',
            ]
        );

    }
}
