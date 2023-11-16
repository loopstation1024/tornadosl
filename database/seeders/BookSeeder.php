<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()
            ->count(10)
            ->hasChapters(10)
            ->create();

        Book::factory()
            ->count(10)
            ->hasChapters(23)
            ->create();
        
        Book::factory()
            ->count(10)
            ->hasChapters(54)
            ->create();

        Book::factory()
            ->count(10)
            ->hasChapters(23)
            ->create();

        Book::factory()
            ->count(10)
            ->hasChapters(65)
            ->create();
    }
}
