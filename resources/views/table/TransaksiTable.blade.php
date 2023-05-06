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
                        href="../table/Transaksi">Transaksi</a>
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
                                    <th>Jumlah Kain</th>
                                    <th>Nama Kertas</th>
                                    <th>Jumlah Kertas</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Roll;
                                    use App\Models\StokKain;
                                    use App\Models\Kain;
                                    use App\Models\StokKertas;
                                    use App\Models\Kertas;
                                    $no = 1;
                                @endphp
                                @foreach ($data as $temp)
                                @php
                                // BISA DI UPDATE PAKE JOIN TABLE; cara biar kolom keterangan lebih lebar daripada kolom lainnya ?
                                    // kain
                                    $id_kain = StokKain::where('ID_STOK_KAIN', $temp->ID_STOK_KAIN)->value('ID_KAIN');
                                    $nama_kain = Kain::where('ID_KAIN', $id_kain)->value('NAMA_KAIN');
                                    // kertas
                                    $id_kertas = StokKertas::where('ID_STOK_KERTAS', $temp->ID_STOK_KERTAS)->value('ID_KERTAS');
                                    $nama_kertas = Kertas::where('ID_KERTAS', $id_kertas)->value('NAMA_KERTAS');
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $nama_kain }}</td>
                                    <td>{{ $temp->JUMLAH_KAIN }}</td>
                                    <td>{{ $nama_kertas }}</td>
                                    <td>{{ $temp->JUMLAH_KERTAS }}</td>
                                    <td>{{ $temp->TGL }}</td>
                                    <td>{{ $temp->KETERANGAN }}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
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