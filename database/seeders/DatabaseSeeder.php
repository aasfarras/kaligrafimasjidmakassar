<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bahan;
use App\Models\Masjid;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'password' => Hash::make('admin123')
        ]);

        Masjid::create(['nama' => 'Masjid Yaqin']);
        Masjid::create(['nama' => 'Masjid Baitul Aman']);
        Masjid::create(['nama' => 'Masjid Baitul Yaqin']);
        Masjid::create(['nama' => 'Masjid Aqsa']);
        Masjid::create(['nama' => 'Masjid Baitul']);
        Masjid::create(['nama' => 'Masjid Taqwa']);
        Masjid::create(['nama' => 'Masjid Ar-Rum']);
        
        Bahan::create(['nama' => 'pembatas shaf']);
        Bahan::create(['nama' => 'sticker kaca (sandblast)']);
        Bahan::create(['nama' => 'kaligrafi kubah']);
        Bahan::create(['nama' => 'kaligrafi ACP']);
        Bahan::create(['nama' => 'kaligrafi akrilik']);
        Bahan::create(['nama' => 'kaligrafi CAT']);
    }
}
