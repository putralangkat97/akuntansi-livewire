<form wire:submit.prevent="updateSubAkun">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label>General Akun:</label>
                <select wire:model="akun_id" class="form-control">
                    <option value="">Pilih</option>
                    @foreach ($akuns as $akun)
                    <option value="{{ $akun->id }}">{{ $akun->nama_akun }}</option>
                    @endforeach
                </select>
                @error('akun_id') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label>Nama Sub Akun:</label>
                <input wire:model="nama_sub_akun" type="text" class="form-control" placeholder="nama sub akun">
                @error('nama_sub_akun') <span class="text-danger error">{{ $message }}</span> @enderror
                <input type="hidden" wire:model="subAkunId">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button class="btn btn-sm btn-block btn-info">Update</button>
        </div>
    </div>
</form>