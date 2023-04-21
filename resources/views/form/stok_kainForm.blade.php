@extends('../layout.main')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Stok Kain</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="../form/Stok_Kain">Stok
                        Kain</a>
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
                        <form method="POST" action="{{ route('stok_kain.store') }}">
                            @csrf
                            <label class="switch">
                                <input type="checkbox" id="switch-btn">
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <label for="select2SinglePlaceholder1">Produksi</label>
                                <select class="select2-single-placeholder1 form-control" name="id_produksi"
                                    id="select2SinglePlaceholder1">
                                    <option value="">Select</option>
                                    @foreach ($produksis as $produksi)
                                        <option value="{{ $produksi->ID_PRODUKSI }}">{{ $produksi->NAMA_PRODUKSI }}</option>
                                    @endforeach  
                                    {{-- textfieldform --}}
                                </select>
                                <input type="text" class="form-control" id="other-produksi"
                                aria-describedby="other-produksiHelp"
                                placeholder="Masukkan nama produksi" style="display: none;" name="nama_produksi">
                            </div>
                            <label class="switch">
                                <input type="checkbox" id="switch-btn-1">
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <label for="select2SinglePlaceholder2">Kain</label>
                                <select class="select2-single-placeholder2 form-control" name="id_kain"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    @foreach ($kains as $kain)
                                        <option value="{{ $kain->ID_KAIN }}">{{ $kain->NAMA_KAIN }}</option>
                                    @endforeach  
                                    {{-- textfieldform --}}
                                </select>
                                <input type="text" class="form-control" id="other-kain"
                                aria-describedby="other-kainHelp"
                                placeholder="Masukkan nama kain" style="display: none;" name="nama_kain">
                            </div>
                            <div class="form-group">
                                <label for="touchSpin1">Total Roll</label>
                                <input id="touchSpin1" type="text" class="form-control" name="total_roll">
                            </div>
                            <div class="form-group">
                                <label for="touchSpin2">Total Yard</label>
                                <input id="touchSpin2" type="text" class="form-control" name="total_yard">
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
        // switch button
        const switchBtn = document.getElementById('switch-btn');
        const selectForm = document.getElementById('select2SinglePlaceholder1');
        const textFormField = document.getElementById('other-produksi');
        
        switchBtn.addEventListener('click', () => {
            if (selectForm.style.display === 'none') {
                selectForm.style.display = 'block';
                $(selectForm).select2(); // Re-enable select2
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder1').select2({
                    placeholder: "Select Produksi",
                    allowClear: true
                });
                textFormField.style.display = 'none';
                switchBtn.textContent = 'Tambah Produksi';
                textFormField.value = '';
            } else {
                $(selectForm).select2('destroy');
                
                selectForm.style.display = 'none';
                textFormField.style.display = 'block';
                switchBtn.textContent = 'Select Produksi';
                selectForm.selectedIndex = 0;
            }
        });
        

        // switch button
        const switchBtnKain = document.getElementById('switch-btn-1');
        const selectFormKain = document.getElementById('select2SinglePlaceholder2');
        const textFormFieldKain = document.getElementById('other-kain');
        
        switchBtnKain.addEventListener('click', () => {
            if (selectFormKain.style.display === 'none') {
                selectFormKain.style.display = 'block';
                $(selectFormKain).select2(); // Re-enable select2
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder2').select2({
                    placeholder: "Select Kain",
                    allowClear: true
                });
                textFormFieldKain.style.display = 'none';
                switchBtnKain.textContent = 'Tambah Kain';
                textFormFieldKain.value = '';
            } else {
                $(selectFormKain).select2('destroy');
                
                selectFormKain.style.display = 'none';
                textFormFieldKain.style.display = 'block';
                switchBtnKain.textContent = 'Select Kain';
                selectFormKain.selectedIndex = 0;
            }
        });
        // Select2 Single  with Placeholder
        $('.select2-single-placeholder1').select2({
            placeholder: "Select Produksi",
            allowClear: true
        });

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder2').select2({
            placeholder: "Select Kain",
            allowClear: true
        });

        $('#touchSpin1').TouchSpin({
            min: 0,
            max: 1000000000,
            boostat: 5,
            maxboostedstep: 10,
            initval: 0
        });

        $('#touchSpin2').TouchSpin({
            min: 0,
            max: 1000000000,
            decimals: 2,
            step: 0.01,
            postfix: 'yard',
            initval: 0,
            boostat: 5,
            maxboostedstep: 10
        });

    });
</script>
@endsection