<?php

use App\Models\Akun;
use Illuminate\Database\Seeder;

class AkunSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akun::create([
            'no_akun' => 1,
            'nama_akun' => 'ASET'
        ]);
        Akun::create([
            'no_akun' => 2,
            'nama_akun' => 'UTANG'
        ]);
        Akun::create([
            'no_akun' => 3,
            'nama_akun' => 'MODAL'
        ]);
        Akun::create([
            'no_akun' => 4,
            'nama_akun' => 'PENDAPATAN'
        ]);
        Akun::create([
            'no_akun' => 5,
            'nama_akun' => 'BIAYA'
        ]);
    }
}
