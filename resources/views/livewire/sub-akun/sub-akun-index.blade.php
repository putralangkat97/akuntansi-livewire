<div>
    {{-- section --}}
    @section('title', 'Sub Akun')
    @section('page-title', 'Sub Akun')
    @section('bread', 'Sub Akun')

    {{-- section --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header border-transparent mb-0 pb-1">
                    <h2 class="card-title">
                        Sub Akun
                    </h2>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body m-0 py-0">
                    @if ($createSubMode == 0)
                        @if (session()->has('berhasil'))
                            <div class="alert alert-success">
                                <strong>Sukses!</strong> {{ session('berhasil') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <button class="btn btn-sm btn-success" wire:click="tambah"><i class="fas fa-plus"></i> Tambah Sub Akun</button>
                    @elseif ($createSubMode == 1)
                        @if (session()->has('berhasil'))
                            <div class="alert alert-success">
                                <strong>Sukses!</strong> {{ session('berhasil') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="batal">
                            <span aria-hidden="true" class="text-danger">&times;</span>
                        </button>
                        @livewire('sub-akun.sub-akun-create')
                    @elseif ($createSubMode == 2)
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="batal">
                            <span aria-hidden="true" class="text-danger">&times;</span>
                        </button>
                        @livewire('sub-akun.sub-akun-update')
                    @endif
                </div>

                <div class="card-body pt-2">
                    <input wire:model="search" type="text" class="form-control mb-2" placeholder="cari sub akun..">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>General Akun</th>
                                <th>Sub Akun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($subakuns as $key => $sa)
                            <tr>
                                <td>{{ ($subakuns->currentpage() - 1) * $subakuns->perpage() + $key + 1 }}</td>
                                <td>{{ $sa->akun->nama_akun }}</td>
                                <td>{{ $sa->nama_sub_akun }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" wire:click="edit({{ $sa->id }})">Edit</button>&nbsp;
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $sa->id }})">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $subakuns->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
