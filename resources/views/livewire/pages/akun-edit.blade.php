<form wire:submit.prevent="updateAkun">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Nama Akun:</label>
                <input wire:model="nama_akun" type="text" class="form-control" placeholder="Nama akun..">
                <input type="hidden" wire:model="akunId">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-6">
            <button class="btn btn-sm btn-block btn-info">Update</button>
        </div>
    </div>
</form>