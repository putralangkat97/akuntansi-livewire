<?php

namespace App\Http\Livewire\JurnalUmum;

use App\Models\Akun;
use Livewire\Component;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalIndex extends Component {
    // Semua variabel yang bisa diakses di blade maupun controller
    public $tanggal, $mutasi, $keterangan, $subAkunId, $nominal;

    

    public function render() {
        return view('livewire.jurnal-umum.jurnal-index');
    }
}
