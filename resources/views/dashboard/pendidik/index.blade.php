<?php
use App\Http\Controllers\PendidikController;
?>

<x-app-layout title="Hasil">
    <div class="card">
        <div class="card-title d-flex align-items-center">
            <div class="col-6">
                <h5>Form Hasil</h5>
            </div>
            <form action="" method="get" class="col-6  d-flex align-items-center">
                <select name="month" id="month" class="form-control">
                    <option value="{{ date('m') }}" disabled selected hidden>{{ $bulan }}</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <button class="btn btn-primary ms-2">Search</button>
                <button href="" class="btn btn-warning ms-2">Reset</button>
            </form>
        </div>
        <div class="card-body">
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
                            @for ($i = 1; $i <= $m; $i++)
                                <th>
                                    <center>Day {{ $i }}<center>
                                </th>
                            @endfor
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
                                        @for ($i = 1; $i <= $m; $i++)
                                            <td>
                                                <center><input type="checkbox" style="pointer-events: none;"
                                                        @if (PendidikController::getCheck($activity->id, $i, $bln)) checked @endif></center>
                                            </td>
                                        @endfor
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
</x-app-layout>
