<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Events;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            "name" => "Fachreza Muslim",
            "email" => "contact@fachreza.com",
            "password" => bcrypt("123456"),
            "user_as" => "students",
        ];

        $user = User::create($user);

        $event = [
            "event_name"        => "Ulang Tahun SMK Negeri 2 Balikpapan",
            "event_description" => "Lorep ipsum dolor sit amet ...",
            "created_by"        => $user->id,
        ];

        Events::create($event);
    }
}
