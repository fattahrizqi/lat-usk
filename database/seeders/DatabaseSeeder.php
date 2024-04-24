<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'fiksi'
        ]);
        Category::create([
            'name' => 'non-fiksi'
        ]);

        user::create([
            'name' => 'jerry setianus',
            'username' => 'jerry',
            'nisn' => 12345678,
            'password' => bcrypt('member'),
            'role' => 'member'
        ]);
        user::create([
            'name' => 'fattah rizqi',
            'username' => 'fattah',
            'nisn' => 123456782,
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        user::create([
            'name' => 'kikimiko',
            'username' => 'kiki',
            'nisn' => 123456781,
            'password' => bcrypt('librarian'),
            'role' => 'librarian'
        ]);
    }
}
