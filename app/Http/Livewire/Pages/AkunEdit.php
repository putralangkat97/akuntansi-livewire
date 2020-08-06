<?php

namespace App\Http\Livewire\Pages;

use App\Models\Akun;
use Livewire\Component;

class AkunEdit extends Component
{
    // menampung kategori
    public $nama_akun;
    public $akunId;

    // mengambil listeners akun
    protected $listeners = ['getAkun'];

    public function getAkun($akun) {
        $this->akunId = $akun['id'];
        $this->nama_akun = $akun['nama_akun'];
    }

    public function updateAkun() {
        $this->validate([
            'nama_akun' => 'required',
        ]);

        if ($this->akunId) {
            $akun = Akun::find($this->akunId);
            $akun->update(['nama_akun' => $this->nama_akun]);

            $this->emit('akunUpdate', $akun);
        }
    }

    public function render()
    {
        return view('livewire.pages.akun-edit');
    }
}
