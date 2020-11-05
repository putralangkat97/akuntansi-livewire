<?php

namespace App\Http\Livewire\SubGeneralAkun;

use App\Models\Akun;
use Livewire\Component;
use App\Models\GeneralAkun;
use App\Models\SubGeneralAkun;

class SubGeneralAkunCreate extends Component {
    // public variabel
    public $nama_sub_general_akun, $general_akun_id, $newNumber;

    // method tambah sub general akun
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
        $general_akun   = $this->general_akun_id;
        
        // men-generate auto number berdasarkan id akun yang dipilih
        if ($akun_id == 1) {
            $lastGeneralAkun            = GeneralAkun::where('akun_id', $general_akun)->get()->map->only('id', 'no_ga')->first();
            $lastNumberSubGeneralAkun   = SubGeneralAkun::with([
                'generalAkun' => function ($query) {
                    $query->where('akun_id', 1)->first();
                }
            ])->where('general_akun_id', $lastGeneralAkun['id'])->orderBy('id', 'desc')->first()->no_sub_ga ?? 0;
            $lastIncrement              = substr($lastNumberSubGeneralAkun, -1);
            $this->newNumber            = $neww.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        } else if ($akun_id == 2) {
            $lastGeneralAkun            = GeneralAkun::where('akun_id', $general_akun)->get()->map->only('id', 'no_ga')->first();
            $lastNumberSubGeneralAkun   = SubGeneralAkun::with([
                'generalAkun' => function ($query) {
                    $query->where('akun_id', 2)->first();
                }
            ])->where('general_akun_id', $lastGeneralAkun['id'])->orderBy('id', 'desc')->first()->no_sub_ga ?? 0;
            $lastIncrement              = substr($lastNumberSubGeneralAkun, -1);
            $this->newNumber            = $neww.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        } else if ($akun_id == 3) {
            $lastGeneralAkun            = GeneralAkun::where('akun_id', $general_akun)->get()->map->only('id', 'no_ga')->first();
            $lastNumberSubGeneralAkun   = SubGeneralAkun::with([
                'generalAkun' => function ($query) {
                    $query->where('akun_id', 3)->first();
                }
            ])->where('general_akun_id', $lastGeneralAkun['id'])->orderBy('id', 'desc')->first()->no_sub_ga ?? 0;
            $lastIncrement              = substr($lastNumberSubGeneralAkun, -1);
            $this->newNumber            = $neww.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        } else if ($akun_id == 4) {
            $lastGeneralAkun            = GeneralAkun::where('akun_id', $general_akun)->get()->map->only('id', 'no_ga')->first();
            $lastNumberSubGeneralAkun   = SubGeneralAkun::with([
                'generalAkun' => function ($query) {
                    $query->where('akun_id', 4)->first();
                }
            ])->where('general_akun_id', $lastGeneralAkun['id'])->orderBy('id', 'desc')->first()->no_sub_ga ?? 0;
            $lastIncrement              = substr($lastNumberSubGeneralAkun, -1);
            $this->newNumber            = $neww.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        } else if ($akun_id == 5) {
            $lastGeneralAkun            = GeneralAkun::where('akun_id', $general_akun)->get()->map->only('id', 'no_ga')->first();
            $lastNumberSubGeneralAkun   = SubGeneralAkun::with([
                'generalAkun' => function ($query) {
                    $query->where('akun_id', 5)->first();
                }
            ])->where('general_akun_id', $lastGeneralAkun['id'])->orderBy('id', 'desc')->first()->no_sub_ga ?? 0;
            $lastIncrement              = substr($lastNumberSubGeneralAkun, -1);
            $this->newNumber            = $neww.str_pad($lastIncrement + 1, 2, 0, STR_PAD_LEFT);
        }

        // tangkap dan bungkus data kedalam variabel form
        $form = [
            'general_akun_id'       => $this->general_akun_id,
            'nama_sub_general_akun' => $this->nama_sub_general_akun,
            'no_sub_ga'             => $this->newNumber
        ];
        
        dd($form);
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
