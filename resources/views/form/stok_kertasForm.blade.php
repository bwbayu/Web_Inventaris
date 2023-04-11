@extends('../layout.main')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Stok Kertas</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="../form/stokKertas">Stok
                        Kertas</a>
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
                                <label for="select2SinglePlaceholderBerat">Berat</label>
                                <select class="select2-single-placeholder-berat form-control" name="state"
                                    id="select2SinglePlaceholder1">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2SinglePlaceholderKertas">Kertas</label>
                                <select class="select2-single-placeholder-kertas form-control" name="state"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="touchSpinPanjang">Panjang</label>
                                <input id="touchSpinPanjang" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="touchSpinLebar">Lebar</label>
                                <input id="touchSpinLebar" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="touchSpinKertas">Kertas</label>
                                <input id="touchSpinKertas" type="text" class="form-control">
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
        $('.select2-single-placeholder-berat').select2({
            placeholder: "Select Berat",
            allowClear: true
        });

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder-kertas').select2({
            placeholder: "Select Kertas",
            allowClear: true
        });

        $('#touchSpinKertas').TouchSpin({
            min: 0,
            max: 1000000000,
            boostat: 5,
            maxboostedstep: 10,
            initval: 0
        });

        $('#touchSpinPanjang').TouchSpin({
            min: 0,
            max: 1000000000,
            decimals: 1,
            step: 0.1,
            postfix: 'cm',
            initval: 0,
            boostat: 5,
            maxboostedstep: 10
        });

        $('#touchSpinLebar').TouchSpin({
            min: 0,
            max: 1000000000,
            decimals: 1,
            step: 0.1,
            postfix: 'cm',
            initval: 0,
            boostat: 5,
            maxboostedstep: 10
        });

    });
</script>
@endsection