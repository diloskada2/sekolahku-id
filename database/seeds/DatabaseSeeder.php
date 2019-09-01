<?php

use App\StudentTrack;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogCategorySeeder::class);
        $this->call(EventSeeder::class);
        $this->call(StudentTrack::class);
    }
}
