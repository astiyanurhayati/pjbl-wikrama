<x-layout title="Paket Soal">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}"> 
    @section('subjudul')
        <div class="pagetitle">
            <h1>Kategori Pembiasaan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kategori </li>
                </ol>
            </nav>
        </div>
    @endsection

    <div class="tombol">
        <div></div>
        <a href="{{ route('dashboard.categories.create') }}"><button class="btn btn-success hover">+ Paket Soal </button></a>
   
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="card">
        <div class="card-header" style="color: black">
            Tabel Paket Soal
        </div>
        <section class="intro">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex ">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class=" table table-responsive-xl bg-white">
                                    <table class="table mb-0 table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th">No</th>
                                                <th>Paket Soal</th>
                                                <th colspan="2" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $category)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td style="text-align: center; width: 50px;">
                                                        <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                                            class="text-blue">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </td>
                                                    <td style="text-align: center; width: 50px;">
                                                        <form
                                                            action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('dashboard.categories.destroy', $category->id) }}"
                                                                 class="text-danger">
                                                                <i class="fa-solid fa-trash text-danger"></i>
                                                            </a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="3">
                                                    Empty
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


</x-layout>