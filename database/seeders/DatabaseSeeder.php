<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookStatus;
use Database\Seeders\RoleSeed;
use Illuminate\Database\Seeder;
use Database\Seeders\PatientSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(PatientSeeder::class);
        $this->call(RoleSeed::class);

        BookStatus::factory(5)->create();

        Book::factory(3)
            ->has(Author::factory()->count(3))
            ->create();
    }
}
