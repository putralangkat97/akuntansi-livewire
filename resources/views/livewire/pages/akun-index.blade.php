<div>
    @section('title', 'Akun')
    @section('page-title', 'Akun')
    @section('bread', 'Akun')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header border-transparent mb-0">
                    <h3 class="card-title">
                        @if ($createMode == 0)
                            List Akun
                        @elseif ($createMode == 1)
                            Tambah Akun
                        @elseif ($createMode == 2)
                            Edit Akun
                        @endif
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                @if ($createMode == 0)
                    <button class="btn btn-success" wire:click="tambah"><i class="fas fa-plus"></i> Tambah Akun</button>
                @elseif ($createMode == 1)
                    @if (session()->has('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses! </strong>{{ session('berhasil') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @livewire('pages.akun-create') <br>
                    <button class="btn btn-danger" wire:click="batal">Batal</button>
                @elseif ($createMode == 2)
                    @livewire('pages.akun-edit') <br>
                    <button class="btn btn-danger" wire:click="batal">Batal</button>
                @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Akun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no = 0; @endphp
                            @foreach ($akuns as $akun)
                            @php $no++ @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $akun->nama_akun }}</td>
                                    <td>
                                        <button class="btn btn-info" wire:click="getAkun({{ $akun->id }})">Edit</button>&nbsp;<button class="btn btn-danger" wire:click="hapusAkun({{ $akun->id }})">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
