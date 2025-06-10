<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('galleries')->insert([
                'description' => 'Deskripsi gambar ke-' . $i,
                'image' => 'https://via.placeholder.com/150?text=Image+' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
