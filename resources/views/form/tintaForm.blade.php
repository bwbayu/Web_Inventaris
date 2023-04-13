@extends('../layout.main')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Tinta</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="../form/Tinta">Tinta</a>
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
                                <label for="select2SinglePlaceholderVolume">Volume</label>
                                <select class="select2-single-placeholder-volume form-control" name="state"
                                    id="select2SinglePlaceholder1">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2SinglePlaceholderWarna">Warna</label>
                                <select class="select2-single-placeholder-warna form-control" name="state"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="touchSpinJumlah">Jumlah Tinta</label>
                                <input id="touchSpinJumlah" type="text" class="form-control">
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
@section('jsCode')
<script>
    $(document).ready(function () {

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder-volume').select2({
            placeholder: "Select Produksi",
            allowClear: true
        });

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder-warna').select2({
            placeholder: "Select Kain",
            allowClear: true
        });

        $('#touchSpinJumlah').TouchSpin({
            min: 0,
            max: 1000000000,
            boostat: 5,
            maxboostedstep: 10,
            initval: 0
        });

    });
</script>
@endsection