<x-layout title="Create Paket Soal">
  @section('subjudul')
  <div class="pagetitle">
    <h1>Form Tambah Paket Soal</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Kategori Pembiasaan</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div>
  @endsection
  <div class="col-lg-6">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create Paket Soal</h5>

        <!-- Vertical Form -->
        <form class="row g-3" action="{{ route('dashboard.categories.store') }}" method="POST">
          @csrf
          <div class="col-12">
            <label for="name" class="form-label">Nama Paket Soal</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
              value="{{ old('name') }}" name="name">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('dashboard.categories.index') }}">
              <button type="button" class="btn btn-secondary">Kembali</button>
            </a>
          </div>
        </form>

      </div>
    </div>
</x-layout>