@extends('../layout.main')
@section('content')
{{-- BATAS AWAL --}}
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Transaksi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="../form/Transaksi">Transaksi</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="select2SinglePlaceholder1">Stok Kain</label>
                                <select class="select2-single-placeholder1 form-control" name="id_stok_kain" id="select2SinglePlaceholder1">    
                                    <option value="">Select</option>
                                    @foreach ($stok_kains as $stok_kain)
                                        @php
                                            $id_kain = $stok_kain->ID_KAIN;
                                            $nama_kain = App\Models\Kain::where('ID_KAIN', $id_kain)->value('NAMA_KAIN');
                                            $id_prod = $stok_kain->ID_PRODUKSI;
                                            $nama_prod = App\Models\Produksi::where('ID_PRODUKSI', $id_prod)->value('NAMA_PRODUKSI');
                                            $data = $nama_kain . '-' . $nama_prod;
                                        @endphp
                                        <option value="{{ $stok_kain->ID_STOK_KAIN }}">{{ $data }}</option>
                                    @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2SinglePlaceholder2">Stok Tinta</label>
                                <select class="select2-single-placeholder2 form-control" name="id_tinta"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    @foreach ($tintas as $tinta)
                                        @php
                                            $id_vol = $tinta->ID_VOLUME;
                                            $vol = App\Models\Volume::where('ID_VOLUME', $id_vol)->value('VOLUME');
                                            $id_warna = $tinta->ID_WARNA;
                                            $nama_warna = App\Models\Warna::where('ID_WARNA', $id_warna)->value('NAMA_WARNA');
                                            $data = $nama_warna . '-' . $vol . ' ml';
                                        @endphp
                                        <option value="{{ $tinta->ID_TINTA }}">{{ $data }}</option>
                                    @endforeach  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2SinglePlaceholder3">Stok Kertas</label>
                                <select class="select2-single-placeholder3 form-control" name="id_stok_kertas"
                                    id="select2SinglePlaceholder3">
                                    <option value="">Select</option>
                                    @foreach ($stok_kertass as $stok_kertas)
                                        @php
                                            $id_kertas = $stok_kertas->ID_KERTAS;
                                            $nama_kertas = App\Models\Kertas::where('ID_KERTAS', $id_kertas)->value('NAMA_KERTAS');
                                            $id_berat = $stok_kertas->ID_BERAT;
                                            $berat = App\Models\Berat::where('ID_BERAT', $id_berat)->value('BERAT');
                                            $data = $nama_kertas . '-' . $berat . ' kg (' . $stok_kertas->PANJANG . ' m x ' . $stok_kertas->LEBAR . ' m)';
                                        @endphp
                                        <option value="{{ $stok_kertas->ID_STOK_KERTAS }}">{{ $data }}</option>
                                    @endforeach  
                                </select>
                            </div>
                            <div class="form-group" id="simple-date1">
                                <label for="simpleDataInput">Tanggal Transaksi</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="" id="simpleDataInput" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                    rows="3" name="keterangan"></textarea>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary mb-1">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- BATAS AKHIR --}}
@section('jsCode')
    <!-- Javascript for this page -->
    <script>
        $(document).ready(function () {

            // Select2 Single  with Placeholder
            $('.select2-single-placeholder1').select2({
                placeholder: "Select Kain",
                allowClear: true
            });

            // Select2 Single  with Placeholder
            $('.select2-single-placeholder2').select2({
                placeholder: "Select Tinta",
                allowClear: true
            });

            // Select2 Single  with Placeholder
            $('.select2-single-placeholder3').select2({
                placeholder: "Select Kertas",
                allowClear: true
            });

            // set default value tgl
            var currentDate = new Date(); // mendapatkan tanggal saat ini
            var day = String(currentDate.getDate()).padStart(2, '0'); // mendapatkan hari dan menambahkan leading zero jika hanya satu digit
            var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // mendapatkan bulan dan menambahkan leading zero jika hanya satu digit
            var year = currentDate.getFullYear(); // mendapatkan tahun

            var today = day + '/' + month + '/' + year; // menggabungkan hari, bulan, dan tahun menjadi format 'MM/DD/YYYY'

            document.getElementById("simpleDataInput").value = today; // mengatur nilai input menjadi tanggal saat ini
            // Bootstrap Date Picker
            $('#simple-date1 .input-group.date').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: 'linked',
                todayHighlight: true,
                autoclose: true,
                placeholder: today,
            });

        });
    </script>
@endsection