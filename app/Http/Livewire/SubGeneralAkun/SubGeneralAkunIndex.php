<?php

namespace App\Http\Livewire\SubGeneralAkun;

use Livewire\Component;
use App\Models\SubGeneralAkun;

class SubGeneralAkunIndex extends Component {
    // listeners
    protected $listeners = [
        'tambah'    => 'tambahSubGeneralAkun',
    ];

    public function tambahSubGeneralAkun($subGeneralAkun) {
        $this->emit(
            'alert', ['type' => 'success', 'message' => '👍 Sub General Akun '. $subGeneralAkun['nama_sub_general_akun'] .' berhasil ditambahkan']
        );
    }

    public function render() {
        return view('livewire.sub-general-akun.sub-general-akun-index', [
            'subGeneralAkuns' => SubGeneralAkun::latest()->get()
        ]);
    }
}
