<form wire:submit.prevent="tambahAkun">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Nama Akun:</label>
                <input wire:model="nama_akun" type="text" class="form-control" placeholder="Nama akun..">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-success">Tambah</button>
        </div>
    </div>
</form>
