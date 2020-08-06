<?php

namespace App\Http\Livewire\SubAkun;

use App\Models\SubAkun;
use Livewire\Component;

class SubAkunIndex extends Component
{
    // listeners
    protected $listeners = [
        'tambah' => 'subAkunTambah'
    ];

    // emit tambah sub akun
    public function subAkunTambah($subakun) {
        // flash message apabila berhasil
        session()->flash('berhasil', $subakun['nama_sub_akun'].' berhasil ditambahkan');
    }

    public function render()
    {
        return view('livewire.sub-akun.sub-akun-index', [
            'subakuns' => SubAkun::latest()->get()
        ]);
    }
}
