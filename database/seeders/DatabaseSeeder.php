<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $user = new User();
        $user->email = "nekochan@mail.com";
        $user->username = "nekochan";
        $user->password = Hash::make("nekochan");
        $user->save();
        
        \App\Models\User::factory(10)->create();
        \App\Models\Categories::factory(10)->create();
        \App\Models\Article::factory(10)->create();
    }
}
