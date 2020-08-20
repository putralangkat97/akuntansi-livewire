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

        // variable kosong buat menampung autonumber
        $lastNumberGeneralAkun  = '';
        $lastIncrement          = '';
        
        // tangkap data akun
        $akun = $this->akun_id;

        // menjalankan sintaks berdasarkan id akun yang di pilih
        if ($akun == 1) {
            // generate number general akun apabila akun yang di pilih 1
            $lastNumberGeneralAkun  = GeneralAkun::where('akun_id', 1)->orderBy('id', 'desc')->first()->no_ga ?? 0;
            $lastIncrement          = substr($lastNumberGeneralAkun, -1);
            $this->newNumber        = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }
        else if ($akun == 2) {
            // generate number general akun apabila akun yang di pilih 2
            $lastNumberGeneralAkun  = GeneralAkun::where('akun_id', 2)->orderBy('id', 'desc')->first()->no_ga ?? 0;
            $lastIncrement          = substr($lastNumberGeneralAkun, -1);
            $this->newNumber        = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }
        else if ($akun == 3) {
            // generate number general akun apabila akun yang di pilih 3
            $lastNumberGeneralAkun  = GeneralAkun::where('akun_id', 3)->orderBy('id', 'desc')->first()->no_ga ?? 0;
            $lastIncrement          = substr($lastNumberGeneralAkun, -1);
            $this->newNumber        = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }
        else if ($akun == 4) {
            // generate number general akun apabila akun yang di pilih 4
            $lastNumberGeneralAkun  = GeneralAkun::where('akun_id', 4)->orderBy('id', 'desc')->first()->no_ga ?? 0;
            $lastIncrement          = substr($lastNumberGeneralAkun, -1);
            $this->newNumber        = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }
        else if ($akun == 5) {
            // generate number general akun apabila akun yang di pilih 5
            $lastNumberGeneralAkun  = GeneralAkun::where('akun_id', 5)->orderBy('id', 'desc')->first()->no_ga ?? 0;
            $lastIncrement          = substr($lastNumberGeneralAkun, -1);
            $this->newNumber        = $this->akun_id.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }

        // tangkap dan bungkus data kita itu kedalam variable form
        $form = [
            'no_ga'             => $this->newNumber,
            'nama_general_akun' => $this->general_akun,
            'akun_id'           => $this->akun_id
        ];

        // masukkan kedatabase data kita yang itu tadi ya kan
        $generalAkun = GeneralAkun::create($form);

        // emit kan ke index supaya realtime data tadi.
        $this->emit('tambah', $generalAkun);

        // hapus isi form setelah berhasil masuk ke database
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
