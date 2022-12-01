<x-layout title="Create Rombel">
    @section('subjudul')
    <div class="pagetitle">
        <h1>Form Tambah Rombel</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Manage</a></li>
            <li class="breadcrumb-item">Rombel</li>
            <li class="breadcrumb-item active">Form</li>
          </ol>
        </nav>
      </div>
    @endsection
  
  <div class="col-lg-6">
  
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Rombel</h5>
  
          <!-- Vertical Form -->
          <form class="row g-3" action="{{ route('dashboard.grades.store') }}" method="POST">
            @csrf
            <div class="col-12">
              <label for="name" class="form-label">Rombel</label>
              <input type="text" value="{{ old('name') }}" name="name" class="form-control  @error('name') is-invalid @enderror" id="name"  placeholder="RPL XII-2">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
             @enderror
            </div>
            
            <div>
              <button type="submit" class="btn btn-primary">Submit</button>

              <a href="{{ route('dashboard.grades.index') }}"> <button type="button" class="btn btn-secondary">Kembali</button></a>
             
            </div>
          </form><!-- Vertical Form -->
  
        </div>
      </div>
    </x-layout>