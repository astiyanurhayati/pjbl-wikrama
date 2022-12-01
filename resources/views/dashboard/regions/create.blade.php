<x-layout title="Create Rayon">


    @section('subjudul')
    <div class="pagetitle">
        <h1>Form Tambah Rayon</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Manage</a></li>
                <li class="breadcrumb-item">Rayon</li>
                <li class="breadcrumb-item active">Form</li>
            </ol>
        </nav>
    </div>
    @endsection

    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Rayon</h5>

      
                <form class="row g-3" action="{{ route('dashboard.regions.store') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="rayon" class="form-label">Rayon</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="rayon" value="{{ old('name') }}" name="name" placeholder="Cisarua 2">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('dashboard.regions.index') }}">
                            <button type="button" class="btn btn-secondary">Kembali</button>
                        </a>

                    </div>
                </form>

            </div>
        </div>
</x-layout>