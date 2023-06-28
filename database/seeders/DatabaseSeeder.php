<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            $numberOfGenres = Genre::count();
            if ($numberOfGenres < 100) {
                $genres = Genre::factory(100 - $numberOfGenres)->make();
                foreach ($genres as $genre) {
                    Genre::withTrashed()->firstOrCreate([
                        'title' => $genre['title'],
                    ], [
                        'title' => $genre['title'],
                    ]);
                }
            }
            Book::factory(100)->create();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
