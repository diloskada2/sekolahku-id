<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Canteen;

class CanteenSeeder extends Seeder {
    public function run() {
        $user = [
            "name" => "Gafriel Alfa",
            "email" => "gafriel@alfarizhi.com",
            "password" => bcrypt("020202"),
            "user_as" => "students",
        ];

        $user = User::create($user);

        $canteen = [
            "name"  => "Keruing",
            "owner" => $user->id,
        ];

        Canteen::create($canteen);
    }
}
