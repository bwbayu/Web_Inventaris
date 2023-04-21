@extends('../layout.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Kertas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="../form/Kertas">Kertas</a>
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
                            <label for="namaKertas">Nama Kertas</label>
                            <input type="text" class="form-control" id="namaKertas"
                                aria-describedby="namaKertasHelp" placeholder="Masukkan nama kertas" required>
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