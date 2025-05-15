@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar barang</h3>

            <div class="card-tools">
                <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-warning">Import Barang</button>
                <a href="{{ url('/barang/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i>Export
                    Barang</a>
                <a href="{{ url('/barang/export_pdf') }}" class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Export
                    Barang</a>
                <button onclick="modalAction('{{ url('/barang/create_ajax') }}')" class="btn btn-success">Tambah Data
                    (Ajax)</button>
            </div>
        </div>
        <div class="card-body">
            <!-- untuk Filter data -->
            <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm row text-sm mb-0">
                            <label for="filter_date" class="col-md-1 col-form-label">Filter</label>
                            <div class="col-md-3">
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    <option value="">- Semua -</option>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Kategori Barang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div> @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div> @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div> @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Barang</th>
                        <th>Nama Kategori</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
            data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

    @push('css')
    @endpush

    @push('js')
        <script>
            function modalAction(url = '') {
                $('#myModal').load(url, function () {
                    $('#myModal').modal('show');
                });
            }
            var dataBarang;
            $(document).ready(function () {
                dataBarang = $('#table_barang').DataTable({
                    // serverSide: true, jika ingin menggunakan server side processing 
                    serverSide: true,
                    ajax: {
                        "url": "{{ url('barang/list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": function (d) {
                            d.kategori_id = $('#kategori_id').val();
                        }
                    },
                    columns: [
                        {  // nomor urut dari laravel datatable addIndexColumn() 
                            data: "DT_RowIndex",
                            className: "text-center",
                            orderable: false,
                            searchable: false
                        }, {
                            data: "barang_kode",
                            className: "",
                            // orderable: true, jika ingin kolom ini bisa diurutkan  
                            orderable: true,
                            // searchable: true, jika ingin kolom ini bisa dicari 
                            searchable: true
                        }, {
                            data: "kategori.kategori_nama",
                            className: "",
                            // orderable: true, jika ingin kolom ini bisa diurutkan  
                            orderable: true,
                            // searchable: true, jika ingin kolom ini bisa dicari 
                            searchable: true
                        }, {
                            data: "barang_nama",
                            className: "",
                            orderable: true,
                            searchable: true
                        }, {
                            // mengambil data level hasil dari ORM berelasi 
                            data: "harga_beli",
                            className: "",
                            orderable: true,
                            searchable: false
                        }, {
                            // mengambil data level hasil dari ORM berelasi 
                            data: "harga_jual",
                            className: "",
                            orderable: true,
                            searchable: false
                        }, {
                            data: "aksi",
                            className: "",
                            orderable: false,
                            searchable: false
                        }
                    ]
                });

                $('#table-barang_filter input').unbind().bind().on('keyup', function (e) {
                    if (e.keyCode == 13) { // enter key
                        tableBarang.search(this.value).draw();
                    }
                });

                $('#kategori_id').on('change', function () {
                    dataBarang.ajax.reload();
                });
            }); 
        </script>
    @endpush