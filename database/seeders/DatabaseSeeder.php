<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Hashing a default password
        ]);

        $stores = Store::factory(15)->create();

        Book::factory(10)->create()->each(function($book) use ($stores) {
            // Attach each book to 1-3 random stores
            $book->stores()->attach(
                $stores->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
