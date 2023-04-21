@extends('../layout.main')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Stok Kertas</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="../form/Stok_Kertas">Stok
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
                        <form action="{{ route('stok_kertas.store') }}" method="POST">
                            @csrf
                            <label class="switch">
                                <input type="checkbox" id="switch-btn-1">
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <label for="select2SinglePlaceholderKertas">Kertas</label>
                                <select class="select2-single-placeholder-kertas form-control" name="id_kertas"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    @foreach ($kertass as $kertas)
                                        <option value="{{ $kertas->ID_KERTAS }}">{{ $kertas->NAMA_KERTAS }}</option>
                                    @endforeach  
                                    {{-- textfieldform --}}
                                    <input type="text" class="form-control" id="other-kertas"
                                    aria-describedby="other-kertasHelp"
                                    placeholder="Masukkan nama kertas" style="display: none;" name="nama_kertas">
                                </select>
                            </div>
                            <label class="switch">
                                <input type="checkbox" id="switch-btn-berat">
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <label for="select2SinglePlaceholderBerat">Berat</label>
                                <select class="select2-single-placeholder-berat form-control" name="id_berat"
                                    id="select2SinglePlaceholder1">
                                    <option value="">Select</option>
                                    @foreach ($berats as $berat)
                                        <option value="{{ $berat->ID_BERAT }}">{{ $berat->BERAT . ' kg' }}</option>
                                    @endforeach  
                                    {{-- textfieldform --}}
                                    <input id="touchSpinBerat" type="number" class="form-control" style="display: none;" name="berat">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="touchSpinPanjang">Panjang</label>
                                <input id="touchSpinPanjang" type="number" class="form-control" name="panjang">
                            </div>
                            <div class="form-group">
                                <label for="touchSpinLebar">Lebar</label>
                                <input id="touchSpinLebar" type="number" class="form-control" name="lebar">
                            </div>
                            <div class="form-group">
                                <label for="touchSpinKertas">Jumlah Kertas</label>
                                <input id="touchSpinKertas" type="number" class="form-control" name="jumlah_kertas">
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
        const switchBtn = document.getElementById('switch-btn-berat');
        const selectForm = document.getElementById('select2SinglePlaceholder1');
        const textFormField = document.getElementById('touchSpinBerat');
        
        switchBtn.addEventListener('click', () => {
            if (selectForm.style.display === 'none') {
                $(selectForm).select2(); // Re-enable select2
                $('#touchSpinBerat').parent().css('visibility', 'hidden');
                selectForm.style.display = 'block';
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder-berat').select2({
                    placeholder: "Select berat",
                    allowClear: true
                });
                textFormField.style.display = 'none';
                switchBtn.textContent = 'Tambah berat';
                textFormField.value = '';
            } else {
                $(selectForm).select2('destroy');
                textFormField.style.display = 'block';
                $('#touchSpinBerat').parent().css('visibility', 'visible');
                $('#touchSpinBerat').TouchSpin({
                    min: 0,
                    max: 1000000000,
                    decimals: 1,
                    step: 0.1,
                    postfix: 'kg',
                    initval: 0,
                    boostat: 5,
                    maxboostedstep: 10
                });
                selectForm.style.display = 'none';
                switchBtn.textContent = 'Select berat';
                selectForm.selectedIndex = 0;
            }
        });

        // switch button
        const switchBtnKertas = document.getElementById('switch-btn-1');
        const selectFormKertas = document.getElementById('select2SinglePlaceholder2');
        const textFormFieldKertas = document.getElementById('other-kertas');
        
        switchBtnKertas.addEventListener('click', () => {
            if (selectFormKertas.style.display === 'none') {
                selectFormKertas.style.display = 'block';
                $(selectFormKertas).select2(); // Re-enable select2
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder-kertas').select2({
                    placeholder: "Select Kertas",
                    allowClear: true
                });
                textFormFieldKertas.style.display = 'none';
                switchBtnKertas.textContent = 'Tambah Kertas';
                textFormFieldKertas.value = '';
            } else {
                $(selectFormKertas).select2('destroy');
                
                selectFormKertas.style.display = 'none';
                textFormFieldKertas.style.display = 'block';
                switchBtnKertas.textContent = 'Select Kertas';
                selectFormKertas.selectedIndex = 0;
            }
        });
        
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