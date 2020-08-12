<?php

namespace App\Http\Livewire\GeneralAkun;

use App\Models\Akun;
use Livewire\Component;
use App\Models\GeneralAkun;

class GeneralAkunCreate extends Component
{
    // public variabel
    public $akun_id, $general_akun, $newNumber;

    public function tambahGeneralAkun() {
        // validasi dulu boss
        $this->validate([
            'akun_id'      => 'required',
            'general_akun' => 'required|max:50'
        ]);
        
        // generate number general akun
        $lastNumberGeneralAkun  = GeneralAkun::orderBy('id', 'desc')->first()->no_ga ?? 0;
        $tes = substr($lastNumberGeneralAkun, -1);
        dd($tes);
        $lastIncrement          = substr($lastNumberGeneralAkun, -1);
        $this->newNumber        = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);

        // tangkap data kita itu boss
        $form = [
            'no_ga'             => $this->newNumber,
            'nama_general_akun' => $this->general_akun,
            'akun_id'           => $this->akun_id
        ];

        // masukkan kedatabase data kita itu kan
        $generalAkun = GeneralAkun::create($form);

        // emit kan ke index supaya realtime data kita.
        $this->emit('tambah', $generalAkun);

        // hapus isi form
        $this->general_akun = null;
        $this->akun_id      = null;
    }

    public function render()
    {
        return view('livewire.general-akun.general-akun-create', [
            'akuns' => Akun::orderBy('no_akun', 'asc')->get()
        ]);
    }
}
