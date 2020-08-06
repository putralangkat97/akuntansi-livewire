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
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Tanggal:</label>
                                <input type="date" wire:model="tanggal" class="form-control" {{$jurnal != '' ? 'readonly' : ''}}>
                                @error('tanggal') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
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
                                <label>Akun:</label>
                                <select class="form-control" wire:model="akun">
                                    <option value="">--Pilih--</option>
                                    <option value="Akun 1">Akun 1</option>
                                    <option value="Akun 2">Akun 2</option>
                                </select>
                                @error('akun') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Nominal:</label>
                                <input type="number" class="form-control" placeholder="0000" wire:model="nominal">
                                @error('nominal') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Keterangan:</label>
                                <input type="text" class="form-control" placeholder="keterangan" wire:model="keterangan">
                                @error('keterangan') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                            <button wire:click="tambahTable" class="btn btn-md btn-primary btn-block" @if ($tanggal == '' || $akun == '' || $mutasi == '' || $nominal == '' || $keterangan == '') disabled @else  @endif}}>Tambah</button>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card-body">
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
                                        <td>{{$j['tanggal']}}</td>
                                        <td>{{$j['mutasi']}}</td>
                                        <td>{{$j['akun']}}</td>
                                        <td>{{$j['nama_akun']}}</td>
                                        <td>Rp. {{number_format($j['nominal'])}}</td>
                                        <td>{{$j['keterangan']}}</td>
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
                            <button class="btn btn-block btn-success float-left" {{$jurnal != '' ? '' : 'disabled'}}>Simpan</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
