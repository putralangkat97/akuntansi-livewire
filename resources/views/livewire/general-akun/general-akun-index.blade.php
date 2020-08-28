<div>

    {{-- section title --}}
    @section('title', 'General Akun')
    @section('page-title', 'General Akun')
    @section('bread', 'General Akun')
    {{-- end section title --}}

    {{-- section content --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-transparent mb-0 pb-0">
                    <h2 class="card-title">
                        General Akun
                    </h2>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body mt-0">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                            @livewire('general-akun.general-akun-create')
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                            <h4 class="card-title mb-2"><strong>List General Akun</strong></h4>
                            <input type="text" class="form-control mb-2" wire:model="search" placeholder="Cari general akun ..">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>No. GA</th>
                                        <th>General Akun</th>
                                        <th>Akun</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse ($generalAkuns as $general)
                                        <tr>
                                            <td>{{ $general->no_ga }}</td>
                                            <td>{{ $general->nama_general_akun }}</td>
                                            <td>{{ $general->akun->no_akun }} - {{ $general->akun->nama_akun }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger text-white" wire:click="hapus({{ $general->id }})">hapus</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted" colspan="4"><span>Belum ada akun.</span></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $generalAkuns->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end section content --}}

</div>
