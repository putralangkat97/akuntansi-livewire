<?php

namespace App\Http\Livewire\GeneralAkun;

use Livewire\Component;
use App\Models\GeneralAkun;
use Livewire\WithPagination;

class GeneralAkunIndex extends Component {
    // pagination
    use WithPagination;

    // Untuk update quert search, nama array disesuaikan dengan nama model
    protected $updatesQueryString = ['search'];

    // public variable
    public $search;

    // listeners
    protected $listeners = [
        'tambah'    => 'tambahGeneralAkun',
        'hapus'     => 'hapusGeneralAkun'
    ];

    public function tambahGeneralAkun($generalAkun) {
        $this->emit(
            'alert', ['type' => 'success', 'message' => '👍 General Akun '. $generalAkun['nama_general_akun'] .' berhasil ditambahkan']
        );
    }

    public function hapusGeneralAkun() {
        $this->emit(
            'alert', ['type' => 'success', 'message' => '👍 General Akun berhasil dihapus']
        );
    }

    // method hapus
    public function hapus($id) {
        if ($id) {
            $generalAkun = GeneralAkun::find($id);
            $generalAkun->delete();
            $this->emit('hapus');
            $this->yakin = false;
        }
    }

    public function render() {
        // global query
        $model = GeneralAkun::query();

        // pengkondisian search
        $model->when($this->search, function ($query) {
            // mencari nama_akun
            $searchQuery = function ($query) {
                $query->where('nama_akun', 'like', '%'. $this->search .'%')
                    ->orWhere('no_akun', 'like', '%'. $this->search .'%');
            };

            // mencari nama_general_akun
            $query->where('nama_general_akun', 'like', '%'. $this->search .'%')
                ->orWhere('no_ga', 'like', '%'. $this->search .'%')
                ->orWhereHas('akun', $searchQuery);

            // $query->with(['akun' => $searchQuery]);
        });

        // result hasil pencarian
        $results    = $model->latest('id')
                        ->paginate(5);
        
        return view('livewire.general-akun.general-akun-index', [
            'generalAkuns' => $results
        ]);
    }
}
