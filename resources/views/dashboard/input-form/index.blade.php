<x-layout title="input form">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    @section('subjudul')
    <div class="pagetitle">
        <h1>Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Daftar Siswa</li>
            </ol>
        </nav>
    </div>
@endsection

    <div class="card">
        <div class="card-title px-3">
            <h5>Daftar Siswa</h5>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between form-group">
                <select class="form-select w-auto"
                onchange="window.location.href = `?grade=${this.value}&region={{ request()->get('region') }}`">
                <option selected disabled>Pilih Rombel</option>
                <option value="">All</option>
                @forelse ($grades as $grade)
                    <option {{ $grade->id == request()->get('grade') ? 'selected disabled' : '' }}
                        value="{{ $grade->id }}">{{ $grade->name }}</option>
                @empty
                    <option value="" disabled>Empty</option>
                @endforelse
             </select>
                <a href="{{ route('dashboard.input-form.create') }}" onclick="event.preventDefault()"
                data-bs-toggle="modal" data-bs-target="#modalCreate" class="btn btn-primary"><i
                    class="bi bi-plus"></i>
                Tambah Siswa
            </a>

            </div>
            @if (session()->has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Rayon</th>
                            <th>Rombel</th>
                            <th>Akun</th>
                            <th class="text-center" colspan="3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td class="column__max text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $student->nis }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->region->name }}</td>
                                <td>{{ $student->grade->name }}</td>
                                <td>
                                   {{ $student->user->username }}
                                </td>
                                <td class="column__max text-center">
                                     <a href="{{ route('dashboard.input-form.edit', $student->id) }}" class="text-blue">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td class="column__max text-center">
                                    <form action="{{ route('dashboard.input-form.destroy', $student->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="event.preventDefault();
                                this.closest('form').submit();"
                                            href="{{ route('dashboard.input-form.destroy', $student->id) }}"
                                            class="text-danger">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">
                                    Empty
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="showAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="showAccountTitle"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="account-content"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCreateLabel">Tambah Soal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.input-form.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" value="{{ old('name') }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Masukkan nama siswa">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" value="{{ old('nis') }}" name="nis"
                                class="form-control @error('nis') is-invalid @enderror" id="nis"
                                placeholder="Masukkan nis siswa">
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="grade_id" class="form-label">Rombel</label>
                            <select name="grade_id" class="form-select @error('grade_id') is-invalid @enderror"
                                id="grade_id">
                                @forelse ($grades as $grade)
                                    <option {{ $grade->id === old('grade_id') ? 'selected' : '' }}
                                        value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @empty
                                    <option disabled selected value="">Empty</option>
                                @endforelse
                            </select>
                            @error('grade_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="region_id" class="form-label">Rayon</label>
                            <select name="region_id" class="form-select @error('region_id') is-invalid @enderror"
                                id="region_id">
                                @forelse ($regions as $region)
                                    <option {{ $region->id === old('region_id') ? 'selected' : '' }}
                                        value="{{ $region->id }}">{{ $region->name }}</option>
                                @empty
                                    <option disabled selected value="">Empty</option>
                                @endforelse
                            </select>
                            @error('region_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{ old('username') }}" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="rifkaa">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> -->
                        <!-- <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" value="{{ old('password') }}" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="********">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    {{-- <script>
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
    }); 
    </script> --}}
</x-layout>
