<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ProgramStudi::create([
            'name' => 'Teknik Informatika',
            'code' => 'TIF'
        ]);

        ProgramStudi::create([
            'name' => 'Manajemen Informatika',
            'code' => 'MIF'
        ]);

        ProgramStudi::create([
            'name' => 'Teknik Komputer',
            'code' => 'TKK'
        ]);
        ProgramStudi::create([
            'name' => 'Teknik Informatika Bondowoso',
            'code' => 'TIF BWS'
        ]);

        ProgramStudi::create([
            'name' => 'Teknik Informatika Nganjuk',
            'code' => 'TIF NJK'
        ]);

        ProgramStudi::create([
            'name' => 'Teknik Informatika Sidoarjo',
            'code' => 'TIF SDJ'
        ]);

        ProgramStudi::create([
            'name' => 'Bisnis Digital',
            'code' => 'BSD'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(
            [
                DosenSeeder::class,
            ]
        );

        \App\Models\User::factory(300)->create();
    }
}
