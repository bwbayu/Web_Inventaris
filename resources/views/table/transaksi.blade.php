@extends('../layout.main')

@section('content')
    <!-- CONTENT -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tabel Transaksi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="../table/transaksi">Transaksi</a>
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kain</th>
                                    <th>Warna Tinta</th>
                                    <th>Nama Kertas</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>kain 1</td>
                                    <td>hitam</td>
                                    <td>kertas 1</td>
                                    <td>09/04/2023</td>
                                    <td>bruh</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>kain 1</td>
                                    <td>hitam</td>
                                    <td>kertas 1</td>
                                    <td>09/04/2023</td>
                                    <td>bruh</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            
@section('jsCode')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endsection