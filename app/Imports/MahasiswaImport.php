<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'nim' => $row['nim'],
            'gender' => $row['gender'],
            'program_studi_id' => $row['prodi'],
            'angkatan' => $row['angkatan'],
            'password' => bcrypt('password'),
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ]);
    }
}
