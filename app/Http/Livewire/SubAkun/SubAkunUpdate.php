<?php

namespace App\Http\Livewire\SubAkun;

use App\Models\Akun;
use App\Models\SubAkun;
use Livewire\Component;

class SubAkunUpdate extends Component
{
    // public variable
    public $subAkunId, $akun_id, $nama_sub_akun;

    // listeners dari index
    protected $listeners = ['getSubAkun'];

    // method menangkap data dari index
    public function getSubAkun($subAkun) {
        $this->akun_id = $subAkun['akun_id'];
        $this->nama_sub_akun = $subAkun['nama_sub_akun'];
        $this->subAkunId = $subAkun['id'];
    }

    // method untuk mengupdate data
    public function updateSubAkun() {
        // validasi
        $this->validate([
            'akun_id' => 'required',
            'nama_sub_akun' => 'required',
        ]);

        // menangkap data dari form input ke dalam array
        $form = array(
            'akun_id' => $this->akun_id,
            'nama_sub_akun' => $this->nama_sub_akun
        );

        // sintaks untuk mengupdate data ke database
        if ($this->subAkunId) {
            $subAkun = SubAkun::find($this->subAkunId);
            $subAkun->update($form);

            $this->akun_id = '';
            $this->nama_sub_akun = '';
            $this->emit('update', $subAkun);
        }
    }

    public function render()
    {
        return view('livewire.sub-akun.sub-akun-update', [
            'akuns' => Akun::orderBy('nama_akun', 'asc')->get()
        ]);
    }
}
