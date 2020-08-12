<form wire:submit.prevent="updateGeneralAkun">
    <div class="row">
        <div class="col">
            <h2 class="card-title"><strong>Tambah Akun</strong></h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Akun:</label>
                <select wire:model="akun_id" class="form-control">
                    <option value="">Pilih</option>
                    @foreach ($akuns as $akun)
                    <option value="{{ $akun->id }}">{{ $akun->no_akun }} - {{ $akun->nama_akun }}</option>
                    @endforeach
                </select>
                @error('akun_id') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>General Akun:</label>
                <input wire:model="general_akun" type="text" class="form-control" placeholder="General Akun">
                @error('general_akun') <span class="text-danger error">{{ $message }}</span> @enderror
                <input type="hidden" wire:model="generalAkunId">
                <input type="hidden" wire:model="no_ga">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-block btn-info">Update</button>
        </div>
    </div>
</form>