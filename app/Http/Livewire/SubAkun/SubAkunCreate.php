<?php

namespace App\Http\Livewire\SubAkun;

use App\Models\Akun;
use App\Models\SubAkun;
use Livewire\Component;

class SubAkunCreate extends Component
{
    // public variabel
    public $akun_id, $sub_akun;

    public function tambahSubAkun() {
        $this->validate([
            'akun_id' => 'required',
            'sub_akun' => 'required',
        ]);

        $form = [
            'akun_id' => $this->akun_id,
            'nama_sub_akun' => $this->sub_akun
        ];

        $subakun = SubAkun::create($form);

        $this->akun_id = '';
        $this->sub_akun = '';
        $this->emit('tambah', $subakun);
    }

    public function render()
    {
        return view('livewire.sub-akun.sub-akun-create', [
            'akuns' => Akun::orderBy('nama_akun', 'asc')->get()
        ]);
    }
}
