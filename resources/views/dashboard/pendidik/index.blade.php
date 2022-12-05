<?php
use App\Http\Controllers\PendidikController;
?>

<x-layout title="Hasil">
    <link rel="stylesheet" href="asset('assets/css/table.css')">

    @section('subjudul')
    <div class="pagetitle">
        <h1>Rekap Pembiasaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item ">Pembiasaan</li>

                <li class="breadcrumb-item active">Rekap</li>
                
            </ol>
        </nav>
    </div>
    @endsection

    <div class="card">
        <div class="card-title d-flex align-items-center px-3">
            <div class="col-6">
                <h5>Rekap Checklist Pembiasaan</h5>
            </div>
            <form action="{{ route('dashboard.pendidik.index') }}" method="GET" class="col-6  d-flex align-items-center">
                <select name="month" id="month" class="form-control">
                    <option value="{{ date('m') }}" disabled selected hidden>{{ $bulan }}</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                
                    <button type="submit" class="btn btn-primary ms-2" style="background-color: #415798 !important">Search</button>
               
                
                <button href="{{ route('dashboard.pendidik.index') }}" class="btn btn-warning ms-2">Reset</button>
            </form>
        </div>
        <div class="card-body">
            @if(session('success-add'))
                <div class="alert alert-success mt-3" role="alert">
                    <span>Data Berhasil Ditambahkan</span>
                </div>
            @endif
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Pembiasaan<center>
                            </th>
                            @foreach($myActivities as $ma)
                                <th>
                                    <center>Tgl. {{ \Carbon\Carbon::parse($ma['date'])->format('j') }}<center>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th colspan="9999">{{ $category->name }}</th>
                            </tr>
                            @php $no = 1 @endphp
                            @forelse ($activities as $k => $activity)
                                @if ($activity->category->id === $category->id)
                                    <tr>
                                        <td class="column__max text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td>{{ $activity->name }}</td>

                                        {{-- <td class="column__max">
                                            <form action="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                                    href="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                    class="text-danger">
                                                </a>
                                            </form>
                                        </td> --}}
                                        @foreach($myActivities as $ma)
                                            @php 
                                                $checkId = explode(",", $ma['activity_id'])
                                            @endphp
                                            <td>
                                                <center>
                                                    @if(in_array($activity->id, $checkId))
                                                    <i class="bi bi-check-circle-fill text-primary"></i>
                                                    @else
                                                    -
                                                    @endif
                                                </center>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">
                                        Empty
                                    </td>
                                </tr>
                            @endforelse
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
</x-layout>
