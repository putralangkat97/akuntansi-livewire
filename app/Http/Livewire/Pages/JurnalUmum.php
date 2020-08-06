<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class JurnalUmum extends Component
{
    // Semua variabel yang bisa diakses di blade maupun controller
    public $tanggal;
    public $nominal;
    public $akun;
    public $nama_akun = 'Akun Demo';
    public $keterangan;
    public $mutasi;
    public $jurnal;
    public $totalDebit;
    public $totalKredit;

    // method tambah ke tabel
    public function tambahTable() {
        // membuat validasi
        $this->validate([
            'tanggal'       => 'required',
            'mutasi'        => 'required',
            'akun'          => 'required',
            'nominal'       => 'required',
            'keterangan'    => 'required'
        ]);

        // input semua kedalam array;
        $this->jurnal[] = [
            'tanggal'       => $this->tanggal,
            'mutasi'        => $this->mutasi,
            'akun'          => $this->akun,
            'nama_akun'     => $this->nama_akun,
            'nominal'       => $this->nominal,
            'keterangan'    => $this->keterangan,
        ];

        // mengosongkan form ketika data berhasil ditambah
        $this->hapusForm();
    }

    // method untuk mengosongkan form
    protected function hapusForm() {
        $this->nominal = '';
        $this->mutasi = '';
        $this->akun = '';
        $this->nominal = '';
        $this->keterangan = '';
    }

    public function render()
    {
        return view('livewire.pages.jurnal-umum');
    }
}
