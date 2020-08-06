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

                <div class="card-body">
                    <div class="m-0 py-0">
                        @if (session()->has('berhasil'))
                            <div class="alert alert-success">
                                <strong>Sukses!</strong> {{ session('berhasil') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @livewire('sub-akun.sub-akun-create')
                    </div>
                </div>

                <div class="card-body pt-2">
                    <input type="text" class="form-control mb-2" placeholder="cari sub akun..">
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
                                <td>{{ ++$key }}</td>
                                <td>{{ $sa->akun->nama_akun }}</td>
                                <td>{{ $sa->nama_sub_akun }}</td>
                                <td>x</td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>

            </div>
        </div>
    </div>
</div>
