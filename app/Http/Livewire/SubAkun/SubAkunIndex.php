<?php

namespace App\Http\Livewire\SubAkun;

use App\Models\SubAkun;
use Livewire\Component;
use Livewire\WithPagination;

class SubAkunIndex extends Component
{
    // pagination
    use WithPagination;

    // Untuk update quert search, nama array disesuaikan dengan nama model
    protected $updatesQueryString = ['search'];

    // public variable
    public $search;
    public $createSubMode = 0;

    // listeners
    protected $listeners = [
        'tambah' => 'subAkunTambah',
        'update' => 'subAkunUpdate'
    ];

    // emit tambah sub akun
    public function subAkunTambah($subakun) {
        // flash message apabila berhasil
        session()->flash('berhasil', $subakun['nama_sub_akun'].' berhasil ditambahkan');
    }

    // emit uupdate sub akun
    public function subAkunUpdate($subAkun) {
        // flash message apabila berhasil
        session()->flash('berhasil', $subAkun['nama_sub_akun'].' berhasil diupdate');
        $this->createSubMode = 0;
    }

    // method edit
    public function edit($id) {
        $subAkun = SubAkun::find($id);

        $this->emit('getSubAkun', $subAkun);
        $this->createSubMode = 2;
    }

    // method hapus
    public function delete($id) {
        if ($id) {
            $subAkun = SubAkun::where('id', $id)
                        ->delete();

            session()->flash('berhasil', 'Sub Akun berhasil dihapus');
            $this->createSubMode = 0;
        }
    }

    // menampilkan form tambah ketika di klik
    public function tambah() {
        $this->createSubMode = 1;
    }

    // menyembunyikan form tambah/update ketika di klik
    public function batal() {
        $this->createSubMode = 0;
    }

    public function render()
    {
        // global query
        $model = SubAkun::query();

        // pengkondisian search
        $model->when($this->search, function ($query) {
            // mencari nama_akun
            $searchQuery = function ($query) {
                $query->where('nama_akun', 'like', '%'. $this->search .'%');
            };

            // mencari nama_sub_akun
            $query->where('nama_sub_akun', 'like', '%'. $this->search .'%')
                ->orWhereHas('akun', $searchQuery);

            // $query->with(['akun' => $searchQuery]);
        });

        // result hasil pencarian
        $results = $model->latest('id')->paginate(5);
        
        return view('livewire.sub-akun.sub-akun-index', [
            'subakuns' => $results
        ]);
    }
}
