<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /*
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::create([
            'name' => 'Mukhamad Angga Gumilang, S. Pd., M. Eng.',
            'email' => 'angga.gumilang@polije.ac.id',
            'nip' => '19940812 201903 1 013',
            'program_studi_id' => 1,
            'password' => bcrypt('password'),
        ]);

        Dosen::factory(300)->create();
    }
}