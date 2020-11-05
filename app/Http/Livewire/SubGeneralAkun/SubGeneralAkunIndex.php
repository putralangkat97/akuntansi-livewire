<?php

namespace App\Http\Livewire\SubGeneralAkun;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SubGeneralAkun;

class SubGeneralAkunIndex extends Component {
    // pagination
    use WithPagination;

    // untuk update query search, nama array disesuaikan dengan nama model
    protected $updatesQueryString = ['search'];

    // Public variable
    public $search;
    
    // listeners
    protected $listeners = [
        'tambah'    => 'tambahSubGeneralAkun',
        'hapus'     => 'hapusSubGeneralAkun'
    ];

    public function tambahSubGeneralAkun($subGeneralAkun) {
        $this->emit(
            'alert', ['type' => 'success', 'message' => '👍 Sub General Akun '. $subGeneralAkun['nama_sub_general_akun'] .' berhasil ditambahkan']
        );
    }

    public function hapusSubGeneralAkun() {
        $this->emit(
            'alert', ['type' => 'success', 'message' => '👍 Sub General Akun berhasil dihapus']
        );
    }

    // method hapus
    public function hapus($id) {
        if ($id) {
            $subGeneralAkun = SubGeneralAkun::find($id);
            $subGeneralAkun->delete();

            $this->emit('hapus');
        }
    }

    public function render() {
        // global query
        $model = SubGeneralAkun::query();

        // pengkondisian search
        $model->when($this->search, function ($query) {
            // mencari nama general_akun
            $searchQuery = function ($query) {
                $query->where('nama_general_akun', 'like', '%'. $this->search .'%');
            };

            // mencari nama sub general akun dan no. sub general akun
            $query->where('nama_sub_general_akun', 'like', '%'. $this->search .'%')
                ->orWhere('no_sub_ga', 'like', '%'. $this->search .'%')
                ->orWhereHas('generalAkun', $searchQuery);
        });

        // result hasil pencarian
        $results = $model->latest('id')
            ->paginate(5);

        return view('livewire.sub-general-akun.sub-general-akun-index', [
            'subGeneralAkuns' =>$results
        ]);
    }
}
