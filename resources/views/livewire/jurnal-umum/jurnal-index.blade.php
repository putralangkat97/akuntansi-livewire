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
                                    <input type="date" wire:model="tanggal" class="form-control" {{$jurnal != '' ? 'readonly' : ''}}>
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
                            <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Keterangan:</label>
                                    <input type="text" class="form-control" placeholder="keterangan" wire:model="keterangan">
                                    @error('keterangan') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Nominal:</label>
                                    <input type="number" class="form-control" placeholder="0000" wire:model="nominal">
                                    @error('nominal') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Akun:</label>
                                    <select class="form-control" wire:model="akunId">
                                        <option value="">-- Pilih Akun --</option>
                                        @foreach ($akuns as $akun)
                                            <option wire:click="ganti({{ $akun->id }})" value="{{ $akun->nama_akun }}">{{ $akun->nama_akun }}</option>
                                        @endforeach
                                    </select>
                                    @error('akun_parent') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Sub Akun: <small class="text-danger">(harap pilih akun terlebih dahulu)</small></label>
                                    <select class="form-control" wire:model="subAkunId" {{ $subakuns == null ? 'readonly' : '' }}>
                                        <option value="">-- Pilih --</option>
                                        @if ($subakuns != null)
                                            @foreach ($subakuns as $sa)
                                                <option value="{{ $sa->nama_sub_akun }}">{{ $sa->nama_sub_akun }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('subAkunId') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                <button type="submit" class="btn btn-md btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="card-body">
                    @if (session()->has('selisih'))
                        <div class="alert alert-warning mb-2">
                            <strong>Oops!</strong> {{ session('selisih') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('berhasil'))
                        <div class="alert alert-success mb-2">
                            <strong>Sukses!</strong> {{ session('berhasil') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                                @if ($jurnal != '')
                                    @foreach ($jurnal as $j)
                                    <tr class="text-center">
                                        <td>{{ $j['tanggal'] }}</td>
                                        <td>{{ $j['mutasi'] }}</td>
                                        <td>{{ $j['akunId'] }}</td>
                                        <td>{{ $j['subAkunId'] }}</td>
                                        <td>Rp. {{ number_format($j['nominal']) }}</td>
                                        <td>{{ $j['keterangan'] }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center bd-secondary text-muted">
                                        <td colspan="6">Belum ada input.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Debit: Rp. {{number_format($totalDebit)}}</th>
                            <th>Kredit: Rp. {{number_format($totalKredit)}}</th>
                            <th>Selisih: Rp. {{number_format($totalDebit - $totalKredit)}}</th>
                        </tr>
                    </table>
                    <br>

                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                            <button type="submit" wire:click="simpanDB" class="btn btn-success float-left" {{$jurnal != '' ? '' : 'disabled'}}>Simpan</button>&nbsp;
                            @if ($tombol == false)

                            @else
                                <button class="btn btn-danger" wire:click="clear">Reset</button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
