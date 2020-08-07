<div>
    {{-- section --}}
    @section('title', 'Akun')
    @section('page-title', 'Akun')
    @section('bread', 'Akun')

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header border-transparent mb-0 pb-1">
                    <h2 class="card-title">
                        @if ($createMode == 0)
                            List Akun
                        @elseif ($createMode == 1)
                            Tambah Akun
                        @elseif ($createMode == 2)
                            Edit Akun
                        @endif
                    </h2>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                
                {{-- flash messages and form --}}
                <div class="card-body m-0 py-0">
                    @if ($createMode == 0)
                        @if (session()->has('berhasil'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses! </strong>{{ session('berhasil') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <button class="btn btn-sm btn-success" wire:click="tambah"><i class="fas fa-plus"></i> Tambah Akun</button>
                    @elseif ($createMode == 1)
                        @if (session()->has('berhasil'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses! </strong>{{ session('berhasil') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="batal">
                            <span aria-hidden="true" class="text-danger">&times;</span>
                        </button>
                        @livewire('akun.akun-create')
                    @elseif ($createMode == 2)
                        @if (session()->has('berhasil'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses! </strong>{{ session('berhasil') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="batal">
                            <span aria-hidden="true" class="text-danger">&times;</span>
                        </button>
                        @livewire('akun.akun-edit')
                    @endif
                </div>

                {{-- data list --}}
                <div class="card-body pt-2">
                    <input type="text" class="form-control mb-2" wire:model="search" placeholder="cari akun..">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Nama Akun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($akuns as $key => $akun)
                                <tr>
                                    <td>{{ ($akuns->currentpage() - 1) * $akuns->perpage() + $key + 1 }}</td>
                                    <td>{{ $akun->nama_akun }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" wire:click="getAkun({{ $akun->id }})">Edit</button>&nbsp;<button class="btn btn-sm btn-danger" wire:click="hapusAkun({{ $akun->id }})">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    
                    {{-- pagination --}}
                    {{ $akuns->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
