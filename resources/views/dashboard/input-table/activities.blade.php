<x-layout title="Hasil">
    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
    <div class="card">
        <div class="card-title d-flex align-items-center px-3">
            <div class="col-6">
               <h5>Rekap Deskripsi Pekerjaan</h5>
            </div>
            <form action="" method="GET" class="col-6  d-flex align-items-center">
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
                <button type="submit" class="btn btn-primary  ms-2 tombol">Search</button>
                <button href="{{ route('dashboard.input-table.activities', $studentData->id) }}" class="btn btn-warning ms-2">Reset</button>
            </form>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <b>{{ $studentData->name }}</b>
                    <br>
                    <small>{{ $studentData->nis }} || {{ $studentData->grade->name }}
                        <br>
                        {{ $studentData->region->name }}
                    </small>
                </div>
                
                <div>
                    <a href="{{ route('dashboard.input-table.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Mulai Pengerjaan</th>
                            <th>Akhir Pengerjaan</th>
                            <th>Durasi (menit)</th>
                            <th>Deskripsi</th>
                        </tr>
                        @foreach($jobs as $job)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ \Carbon\Carbon::parse($job->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $job->start_jp }}</td>
                            <td>{{ $job->end_jp }}</td>
                            <td>{{ $job->duration }}</td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ $job->id }}" id="detailJob">
                                Lihat Detail
                                </a>
                            </td>
                           </tr>  
                        <tr>
                        @endforeach
                    </thead>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 hover" id="staticBackdropLabel">Deskripsi Pekerjaan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <b id="date-job"></b>
                        <br>
                        <div id="content-job"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
