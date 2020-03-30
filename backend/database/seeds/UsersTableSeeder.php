<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         User::create([
             'name' => 'Robert Al-Romhein',
             'email' => 'robert.alromhein@gmail.com',
             'username' => 'ralromhein',
             'password' =>  Hash::make('123secret')
         ]);

         User::create([
             'name' => 'Marc Louis Aberin',
             'email' => 'marclouisaberin@gmail.com',
             'username' => 'mlaberin',
             'password' =>  Hash::make('123secret')
         ]);

         User::create([
             'name' => 'Jeff Kinal',
             'email' => 'jeffrey.kinal@mail.mcgill.ca',
             'username' => 'jkinal',
             'password' =>  Hash::make('123secret')
         ]);
    }
}