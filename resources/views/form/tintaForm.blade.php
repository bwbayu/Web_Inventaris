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
                            <div class="form-group">
                                <label for="select2SinglePlaceholderTinta">Tinta</label>
                                <select class="select2-single-placeholder-tinta form-control" name="id_tinta"
                                    id="select2SinglePlaceholderTinta">
                                    <option value="">Select</option>
                                    @foreach ($tintas as $tinta)
                                        @php
                                            $id_warna = $tinta->ID_WARNA;
                                            $nama_warna = App\Models\Warna::where('ID_WARNA', $id_warna)->value('NAMA_WARNA');
                                            $id_vol = $tinta->ID_VOLUME;
                                            $vol = App\Models\Volume::where('ID_VOLUME', $id_vol)->value('VOLUME');
                                            $data = $nama_warna . '-' . $vol . " ( Stok : " . $tinta->JUMLAH_TINTA ." )";
                                        @endphp
                                        <option value="{{ $tinta->ID_TINTA }}">{{ $data  }}</option>
                                    @endforeach  
                                    {{-- textfieldform --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="touchSpinJumlah">Jumlah Tinta</label>
                                <input id="touchSpinJumlah" type="number" class="form-control" name="jumlah_tinta">
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
@section('jsCode')
<script>
    $(document).ready(function () {

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder-tinta').select2({
            placeholder: "Select Tinta",
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