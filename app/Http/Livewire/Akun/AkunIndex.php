<?php

namespace App\Http\Livewire\Akun;

use App\Models\Akun;
use Livewire\Component;
use Livewire\WithPagination;

class AkunIndex extends Component
{
    // pagination
    use WithPagination;

    // variabel edit
    public $search;
    public $nama_akun;
    public $createMode = 0;

    // Emit untuk live data
    protected $listeners = [
        'tambah' => 'akunTambah',
        'update' => 'akunUpdate',
    ];

    // Untuk update quert search, nama array disesuaikan dengan nama model
    protected $updatesQueryString = ['search'];

    /* method emit yang digunakan untuk
    * menerima parameter dari method create
    * dan juga flash messages.
    */
    public function akunTambah($akun) {
        // menampilkan pesan flash jika berhasil
        session()->flash('berhasil', $akun['nama_akun'].' berhasil ditambahkan');
    }

    public function akunUpdate($akun) {
        // menampilkan pesan flash jika berhasil
        session()->flash('berhasil', $akun['nama_akun'].' berhasil diupdate');
        $this->createMode = 0;
    }

    public function getAkun($id) {
        $akun = Akun::find($id);

        $this->emit('getAkun', $akun);
        $this->createMode = 2;
    }

    public function hapusAkun($id) {
        if ($id) {
            $akun = Akun::where('id', $id)->delete();
    
            session()->flash('berhasil', 'Akun berhasil dihapus');
            $this->createMode = 0;
        }
    }

    public function batal() {
        $this->createMode = 0;
    }

    public function tambah() {
        $this->createMode = 1;
    }

    public function render()
    {
        return view('livewire.akun.akun-index', [
            'akuns' => $this->search != null
                ? Akun::where('nama_akun', 'like', '%'.$this->search.'%')->paginate(5)
                : Akun::orderBy('id', 'desc')->paginate(5)
        ]);
    }
}
