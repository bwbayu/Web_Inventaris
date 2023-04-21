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
                        <form action="{{ route('tinta.store') }}" method="POST">
                            @csrf
                            <label class="switch">
                                <input type="checkbox" id="switch-btn-1">
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <label for="select2SinglePlaceholderWarna">Warna</label>
                                <select class="select2-single-placeholder-warna form-control" name="id_warna"
                                    id="select2SinglePlaceholder2">
                                    <option value="">Select</option>
                                    @foreach ($warnas as $warna)
                                        <option value="{{ $warna->ID_WARNA }}">{{ $warna->NAMA_WARNA }}</option>
                                    @endforeach  
                                </select>
                                {{-- textfieldform --}}
                                <input type="text" class="form-control" id="other-warna"
                                aria-describedby="other-warnaHelp"
                                placeholder="Masukkan nama warna" style="display: none;" name="nama_warna">
                            </div>
                            <label class="switch">
                                <input type="checkbox" id="switch-btn-volume">
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <label for="select2SinglePlaceholderVolume">Volume</label>
                                <select class="select2-single-placeholder-volume form-control" name="id_volume"
                                    id="select2SinglePlaceholder1">
                                    <option value="">Select</option>
                                    @foreach ($volumes as $volume)
                                        <option value="{{ $volume->ID_VOLUME }}">{{ $volume->VOLUME . ' ml' }}</option>
                                    @endforeach  
                                    {{-- textfieldform --}}
                                </select>
                                <input id="touchSpinVolume" type="number" class="form-control" style="display: none;" name="volume">
                            </div>
                            <div class="form-group">
                                <label for="touchSpinJumlah">Jumlah Tinta</label>
                                <input id="touchSpinJumlah" type="number" class="form-control" name="jumlah_tinta">
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
        const switchBtn = document.getElementById('switch-btn-volume');
        const selectForm = document.getElementById('select2SinglePlaceholder1');
        const textFormField = document.getElementById('touchSpinVolume');
        
        switchBtn.addEventListener('click', () => {
            if (selectForm.style.display === 'none') {
                $(selectForm).select2(); // Re-enable select2
                $('#touchSpinVolume').parent().css('visibility', 'hidden');
                selectForm.style.display = 'block';
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder-volume').select2({
                    placeholder: "Select volume",
                    allowClear: true
                });
                textFormField.style.display = 'none';
                switchBtn.textContent = 'Tambah volume';
                textFormField.value = '';
            } else {
                $(selectForm).select2('destroy');
                textFormField.style.display = 'block';
                $('#touchSpinVolume').parent().css('visibility', 'visible');
                $('#touchSpinVolume').TouchSpin({
                    min: 0,
                    max: 1000000000,
                    decimals: 1,
                    step: 0.1,
                    postfix: 'ml',
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
        const switchBtnWarna = document.getElementById('switch-btn-1');
        const selectFormWarna = document.getElementById('select2SinglePlaceholder2');
        const textFormFieldWarna = document.getElementById('other-warna');
        
        switchBtnWarna.addEventListener('click', () => {
            if (selectFormWarna.style.display === 'none') {
                selectFormWarna.style.display = 'block';
                $(selectFormWarna).select2(); // Re-enable select2
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder-warna').select2({
                    placeholder: "Select Warna",
                    allowClear: true
                });
                textFormFieldWarna.style.display = 'none';
                switchBtnWarna.textContent = 'Tambah Warna';
                textFormFieldWarna.value = '';
            } else {
                $(selectFormWarna).select2('destroy');
                
                selectFormWarna.style.display = 'none';
                textFormFieldWarna.style.display = 'block';
                switchBtnWarna.textContent = 'Select Warna';
                selectFormWarna.selectedIndex = 0;
            }
        });

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder-volume').select2({
            placeholder: "Select Volume",
            allowClear: true
        });

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder-warna').select2({
            placeholder: "Select Warna",
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