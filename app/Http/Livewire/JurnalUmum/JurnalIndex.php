<?php

namespace App\Http\Livewire\JurnalUmum;

use App\Models\Akun;
use App\Models\SubAkun;
use Livewire\Component;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalIndex extends Component
{// Semua variabel yang bisa diakses di blade maupun controller
    public $tanggal, $mutasi, $keterangan, $akunId, $subAkunId, $nominal, $jurnal, $totalDebit, $totalKredit, $subAkunss;
    public $tombol = false;

    // method cari subakun
    public function ganti($id) {
        $subAkun = SubAkun::where('akun_id', $id)->get();
        $this->subAkunss = $subAkun;
    }

    // method tambah ke tabel
    public function tambahTable($id) {
        // membuat validasi
        $this->validate([
            'tanggal'       => 'required',
            'mutasi'        => 'required',
            'keterangan'    => 'required',
            'akunId'        => 'required',
            'nominal'       => 'required',
            'subAkunId'     => 'required'
        ]);

        // input semua kedalam array;
        $this->jurnal[] = [
            'tanggal'       => $this->tanggal,
            'mutasi'        => $this->mutasi,
            'keterangan'    => $this->keterangan,
            'nominal'       => $this->nominal,
            'akunId'        => $this->akunId,
            'subAkunId'     => $this->subAkunId
        ];

        // count data
        $re = count($this->jurnal);

        // menampilkan tombol reset
        if ($re < 0) {
            $this->tombol = false;
        } else {
            $this->tombol = true;
        }

        // for, if, and else if
        for ($y = 0; $y < $re; $y++) {
            if ($y == 0 && $this->jurnal[$y]['mutasi'] == 'Debit') {
                $this->totalDebit = $this->jurnal[$y]['nominal'];
            } else if ($y == 0 && $this->jurnal[$y]['mutasi'] == 'Kredit') {
                $this->totalKredit = $this->jurnal[$y]['nominal'];
            } else if ($y == 1 && $this->jurnal[$y]['mutasi'] == 'Debit') {
                $this->totalDebit = $this->jurnal[$y]['nominal'];
            } else if ($y == 1 && $this->jurnal[$y]['mutasi'] == 'Kredit') {
                $this->totalKredit = $this->jurnal[$y]['nominal'];
            } else if ($y > 1 && $this->jurnal[$y]['mutasi'] == 'Debit') {
                $this->totalDebit += $this->jurnal[$y]['nominal'];
            } else if ($y > 1 && $this->jurnal[$y]['mutasi'] == 'Kredit') {
                $this->totalKredit += $this->jurnal[$y]['nominal'];
            }
        }

        // mengosongkan form ketika data berhasil ditambah
        $this->hapusForm();
    }

    // method memasukkan ke database
    public function simpanDB() {
        $gm = count($this->jurnal);
        if ($gm > 0 && $gm >= 1) {
            // mengecek selisih antara debit dan kredit
            if ($this->totalDebit != $this->totalKredit) {
                session()->flash('selisih', 'Terdapat selisih');
            } else if ($this->totalDebit == $this->totalKredit) {
                for ($pd = 0; $pd < $gm; $pd++) {
                    $dan = Akun::where('nama_akun', $this->jurnal[$pd]['akunId'])->pluck('id');
                    $sian = SubAkun::where('nama_sub_akun', $this->jurnal[$pd]['subAkunId'])->pluck('id');
                    $form = [
                        'tanggal' => date('Y-m-d', strtotime($this->jurnal[$pd]['tanggal'])),
                        'mutasi' => $this->jurnal[$pd]['mutasi'],
                        'keterangan' => $this->jurnal[$pd]['keterangan'],
                        'nominal' => $this->jurnal[$pd]['nominal'],
                        'akun_id' => $dan[0],
                        'sub_akun_id' => $sian[0],
                        'user_id' => 1
                    ];

                    // dump($form);

                    JurnalUmum::create($form);
                }

                session()->flash('berhasil', 'Berhasil disimpan ke database');

                $this->tanggal = null;
                $this->resetForm2();
            }
        }
    }

    public function clear() {
        $this->resetForm2();
    }

    // method untuk mengosongkan form
    protected function hapusForm() {
        $this->nominal = '';
        $this->mutasi = '';
        $this->keterangan = '';
        $this->akunId = '';
        $this->subAkunId = '';
        $this->subAkunss = null;
        $this->nominal = '';
    }

    // method untuk menghapus semua isi form dan tabel setelah input ke database
    public function resetForm2() {
        $this->jurnal = null;
        $this->totalDebit = null;
        $this->totalKredit = null;
    }

    public function render()
    {
        return view('livewire.jurnal-umum.jurnal-index', [
            'akuns' => Akun::whereHas('subAkuns')->orderBy('nama_akun', 'desc')->get(),
            'subakuns' => $this->subAkunss
        ]);
    }
}
