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
        $this->call(BlogSeeder::class);
        $this->call(CanteenSeeder::class);
        $this->call(CriticismsSuggestionsSeeder::class);
        $this->call(StudentTrack::class);
        $this->call(ClassesSeeder::class);
        $this->call(BookCategories::class);
        $this->call(PublisherSeeder::class);   
    }
}
