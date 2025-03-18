<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Books;

class BooksSeeder extends Seeder
{
    public function run(): void
    {
        Books::factory()->count(10)->create(); // สร้าง 10 บทความแล้ว Create
    }
}
