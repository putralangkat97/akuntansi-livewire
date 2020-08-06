<?php

namespace App\Http\Livewire\Pages;

use App\Models\Akun;
use Livewire\Component;

class AkunIndex extends Component
{
    // variabel edit
    public $nama_akun;
    public $createMode = 0;

    // Emit untuk live data
    protected $listeners = ['tambahAkun', 'akunUpdate'];

    /* method emit yang digunakan untuk
    * menerima parameter dari method create
    * dan juga flash messages.
    */
    public function tambahAkun($akun) {
        // menampilkan pesan flash jika berhasil
        session()->flash('berhasil', $akun['nama_akun'].' berhasil ditambahkan');
    }

    public function akunUpdate($akun) {
        // menampilkan pesan flash jika berhasil
        session()->flash('berhasil', $akun['nama_akun'].' berhasil diupdate');
    }

    public function getAkun($id) {
        $akun = Akun::find($id);

        $this->emit('getAkun', $akun);
        $this->createMode = 2;
    }

    public function batal() {
        $this->createMode = 0;
    }

    public function tambah() {
        $this->createMode = 1;
    }

    public function render()
    {
        return view('livewire.pages.akun-index', [
            'akuns' => Akun::latest()->get()
        ]);
    }
}
