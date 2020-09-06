<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'GBI NGADINEGARAN',
              'username'		=> 'gbi',
              'email' 			=> 'upi@gmail.com',
              'password'		=> bcrypt('gbi'),
              'gambar'			=> NULL,
              'level'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'name'  			=> 'Angga DK',
              'username'		=> 'anggadk',
              'email' 			=> 'user@gmail.com',
              'password'		=> bcrypt('anggadk'),
              'gambar'			=> NULL,
              'level'			=> 'user',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
