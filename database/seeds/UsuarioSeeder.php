<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Julio Cesar',
            'email' =>'vcjuliocesar@faker.com',
            'password' => Hash::make('12345678'),
            'url'=>'http://miweb.com',
        ]);

        $user2 = User::create([
            'name' => 'Cesar',
            'email' =>'cesar@faker.com',
            'password' => Hash::make('12345678'),
            'url'=>'http://miweb.com',
        ]);

        /*DB::table('users')->insert([
            'name' => 'Julio Cesar',
            'email' =>'vcjuliocesar@faker.com',
            'password' => Hash::make('12345678'),
            'url'=>'http://miweb.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);*/
    }
}
