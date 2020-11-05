<div>
    @section('title', 'Jurnal Umum')
    @section('page-title', 'Jurnal Umum')
    @section('bread', 'Jurnal Umum')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-transparent mb-0">
                    <h3 class="card-title">Jurnal Manual</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-header mt-0">
                    <p class="text-muted">
                        <em>Satu tanggal, Satu transaksi.</em>
                    </p>
                </div>
                <div class="card-body">
                    <form  wire:submit.prevent="tambahTable">
                        <div class="row">
                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Tanggal:</label>
                                    <input type="date" wire:model="tanggal" class="form-control">
                                    @error('tanggal') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Mutasi:</label>
                                    <select class="form-control" wire:model="mutasi">
                                        <option value="">--Pilih--</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                                    @error('mutasi') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Sub Akun: <small class="text-danger">(harap pilih akun terlebih dahulu)</small></label>
                                    <select class="form-control" wire:model="subAkunId">
                                        <option value="">-- Pilih --</option>
                                    </select>
                                    @error('subAkunId') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Nominal:</label>
                                    <input type="number" class="form-control" placeholder="0000" wire:model="nominal">
                                    @error('nominal') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Keterangan:</label>
                                    <input type="text" class="form-control" placeholder="keterangan" wire:model="keterangan">
                                    @error('keterangan') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                                <button type="submit" class="btn btn-md btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="card-body">
                    <div class="alert alert-warning mb-2">
                        <strong>Oops!</strong> {{ session('selisih') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr class="text-center">
                                    <th>Tanggal</th>
                                    <th>Mutasi</th>
                                    <th>Akun</th>
                                    <th>Nama Akun</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Rp. </td>
                                    <td></td>
                                </tr>
                                <tr class="text-center bd-secondary text-muted">
                                    <td colspan="6">Belum ada input.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Debit: Rp. -</th>
                            <th>Kredit: Rp. -</th>
                            <th>Selisih: Rp. -</th>
                        </tr>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                            <button type="submit" wire:click="simpanDB" class="btn btn-success float-left">Simpan</button>&nbsp;
                            <button class="btn btn-danger" wire:click="clear">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
