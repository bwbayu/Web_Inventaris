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
                        href="../form/transaksi">Transaksi</a>
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
                        <form action="">
                            <div class="form-group">
                                <label for="select2SinglePlaceholder1">Stok Kain</label>
                                <select class="select2-single-placeholder1 form-control" name="state"
                                    id="select2SinglePlaceholder1">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2SinglePlaceholder2">Stok Tinta</label>
                                <select class="select2-single-placeholder2 form-control" name="state"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2SinglePlaceholder3">Stok Kertas</label>
                                <select class="select2-single-placeholder3 form-control" name="state"
                                    id="select2SinglePlaceholder3">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group" id="simple-date1">
                                <label for="simpleDataInput">Tanggal Transaksi</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="" id="simpleDataInput">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
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