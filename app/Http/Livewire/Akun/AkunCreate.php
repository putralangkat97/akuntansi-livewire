<?php

namespace App\Http\Livewire\Akun;

use App\Models\Akun;
use Livewire\Component;

class AkunCreate extends Component
{
    // Semua variabel yang bisa diakses di blade maupun controller
    public $nama_akun;

    // method untuk menambahkan akun ke database
    public function tambahAkun() {
        // Validasi form
        $this->validate([
            'nama_akun' => 'required|max:30',
        ]);

        // menangkap isi form ke dalam bentuk
        $form = array('nama_akun' => $this->nama_akun);

        // Input data form ke database
        $akun = Akun::create($form);

        // Setelah berhasil akan mengosongkan form dan mengirim parameter melalui emit
        $this->nama_akun = '';
        $this->emit('tambah', $akun);
    }

    public function render()
    {
        return view('livewire.akun.akun-create');
    }
}
