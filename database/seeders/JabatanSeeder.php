<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                'nama' => 'Superadmin',
                'kode' => 'sadm',
            ],
            [
                'nama' => 'Manager',
                'kode' => 'mgr',
            ],
            [
                'nama' => 'Supervisor',
                'kode' => 'spv',
            ],
            [
                'nama' => 'Staff',
                'kode' => 'stf',
            ],
        ];

        foreach ($jabatan as $key => $value) {
            Jabatan::create($value);
        }
    }
}
