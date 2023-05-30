<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $this->call(
            [
                DosenSeeder::class,
            ]
        );
        User::create([
            'name' => "Hendrawan",
            'email' => "hendrawan@gmail.com",
            'email_verified_at' => now(),
            'nim' => "E41212361",
            'program_studi_id' => 1,
            'angkatan' => '2021',
            'gender' => 'Laki-laki',
            'address' => fake()->address(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'dosen_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'name' => "Iqbal",
            'email' => "iqbal@gmail.com",
            'email_verified_at' => now(),
            'nim' => "E41212362",
            'program_studi_id' => 1,
            'angkatan' => '2021',
            'gender' => 'Laki-laki',
            'address' => fake()->address(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'dosen_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'name' => "Candi",
            'email' => "candi@gmail.com",
            'email_verified_at' => now(),
            'nim' => "E41212363",
            'program_studi_id' => 1,
            'angkatan' => '2021',
            'gender' => 'Laki-laki',
            'address' => fake()->address(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'dosen_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);

        // \App\Models\User::factory(300)->create();
    }
}
