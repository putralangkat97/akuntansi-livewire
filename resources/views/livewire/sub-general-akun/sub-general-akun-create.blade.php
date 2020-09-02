<form wire:submit.prevent="tambahSubGeneral">
    <div class="row">
        <div class="col">
            <h2 class="card-title"><strong>Tambah Sub General Akun</strong></h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>General Akun:</label>
                <select wire:model="general_akun_id" class="form-control">
                    <option value="">Pilih</option>
                    @foreach ($generalAkuns as $akun)
                        <option value="{{ $akun->akun_id }}">{{ $akun->no_ga }} - {{ $akun->nama_general_akun }}</option>
                    @endforeach
                </select>
                @error('general_akun_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Sub General Akun:</label>
                <input wire:model="nama_sub_general_akun" type="text" class="form-control" placeholder="Sub General Akun">
                @error('nama_sub_general_akun') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-block btn-success">Tambah</button>
        </div>
    </div>
</form>
