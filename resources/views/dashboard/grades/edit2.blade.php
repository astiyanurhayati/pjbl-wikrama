<x-layout title="Edit Rombel">
    @section('subjudul')
    <div class="pagetitle">
        <h1>Edit Data Rombel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Master</a></li>
                <li class="breadcrumb-item">Rombel</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
    @endsection

    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Rombel {{ $grade->name }}</h5>

                <!-- Vertical Form -->
                <div class="card-body">
                    <form action="{{ route('dashboard.grades.update', $grade->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Rombel</label>
                            <input type="text" value="{{ old('name', $grade->name) }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name" placeholder="RPL XII-2">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('dashboard.grades.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>

            </div>
        </div>
</x-layout>