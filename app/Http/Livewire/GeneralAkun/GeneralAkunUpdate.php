<?php

namespace App\Http\Livewire\GeneralAkun;

use App\Models\Akun;
use Livewire\Component;
use App\Models\GeneralAkun;

class GeneralAkunUpdate extends Component
{
    // public variable
    public $generalAkunId, $akun_id, $general_akun, $no_ga, $newNumber;

    // listeners dari index
    protected $listeners = ['getGeneralAkun'];

    // method menangkap data dari index
    public function getGeneralAkun($generalAkun) {
        $this->akun_id          = $generalAkun['akun_id'];
        $this->general_akun     = $generalAkun['nama_general_akun'];
        $this->no_ga            = $generalAkun['no_ga'];
        $this->generalAkunId    = $generalAkun['id'];
    }

    // method untuk mengupdate data
    public function updateGeneralAkun() {
        // validasi dulu boss
        $this->validate([
            'akun_id'       => 'required',
            'general_akun'  => 'required|max:30'
        ]);

        // generate number general akun
        $lastNumber         = GeneralAkun::orderBy('id', 'desc')->first()->no_ga ?? 0;
        $lastIncrement      = substr($lastNumber, -1);
        $this->newNumber    = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        // tangkap data kita itu boss
        $form = [
            'akun_id'           => $this->akun_id,
            'nama_general_akun' => $this->general_akun,
            'no_ga'             => $this->newNumber,
        ];

        // masukkan kedatabase data yang kita update itu kan
        if ($this->generalAkunId) {
            $updateGeneralAkun = GeneralAkun::find($this->generalAkunId);
            $updateGeneralAkun->update($form);

            $this->emit('update', $updateGeneralAkun);
        }
    }

    public function render()
    {
        return view('livewire.general-akun.general-akun-update', [
            'akuns' => Akun::orderBy('no_akun', 'asc')->get()
        ]);
    }
}
