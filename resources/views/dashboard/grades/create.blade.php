<x-app-layout title="Tambah Rombel">
    <div class="card">
        <div class="card-title px-3">
            <h5>Form Tambah Rombel</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.grades.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Rombel</label>
                    <input type="text" value="{{ old('name') }}" name="name"
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
</x-app-layout>
