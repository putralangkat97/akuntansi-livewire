<?php

namespace App\Http\Livewire\SubGeneralAkun;

use App\Models\Akun;
use Livewire\Component;
use App\Models\GeneralAkun;
use App\Models\SubGeneralAkun;

class SubGeneralAkunCreate extends Component {
    // public variabel
    public $nama_sub_general_akun, $general_akun_id, $newNumber;

    public function tambahSubGeneral() {
        // validasi terlebih dahulu boss
        $this->validate([
            'general_akun_id'       => 'required',
            'nama_sub_general_akun' => 'required|max:50'
        ], [
            'general_akun_id.required' => 'General akun harus dipilih.',
            'nama_sub_general_akun.required' => 'Kolom tidak boleh kosong.'
        ]);

        // variabel kosong buat ngecek nomor sub general akun
        $lastNumberSubGeneralAkun   = '';
        $lastIncrement              = '';

        // tangkap data general akun
        $general_akun = $this->general_akun_id;

        // menjalankan sintaks berdasarkan id general akun yang dipilih
        if ($general_akun == 1) {
            $lastNumberSubGeneralAkun   = SubGeneralAkun::with([
                'generalAkun' => function ($q) {
                    $q->where('akun_id', 1)->first();
                }
            ])->orderBy('id', 'desc')->first()->no_sub_ga ?? 0;
            $lastIncrement              = substr($lastNumberSubGeneralAkun, -1);
            $this->newNumber            = '101'.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }
        dd($this->newNumber);

        // tangkap dan bungkus data kedalam variabel form
        $form = [
            'general_akun_id'       => $this->general_akun_id,
            'nama_sub_general_akun' => $this->nama_sub_general_akun,
            'no_sub_ga'             => $this->newNumber
        ];
        
        // masukkan data kedalam database
        // $subGeneralAkun = SubGeneralAkun::create($form);

        // emit ke index supaya datanya bisa realtime
        // $this->emit('tambah', $subGeneralAkun);

        // hapus isi form apabila telah berhasil masuk kedalam database
        // $this->kosongkan();
    }

    // method untuk mengosongkan form
    protected function kosongkan() {
        $this->general_akun_id          = null;
        $this->nama_sub_general_akun    = null;
    }

    // method untuk merender dan mengirimkan data ke view
    public function render() {
        return view('livewire.sub-general-akun.sub-general-akun-create', [
            'generalAkuns' => GeneralAkun::orderBy('no_ga', 'asc')->get()
        ]);
    }
}
