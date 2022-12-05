
<x-layout title="welcome">
  
    @section('subjudul')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                
            </ol>
        </nav>
    </div>
@endsection

<p class="alert alert-warning " style="width: 88%">Selamat Datang {{ auth()->user()->username }} </p>



@if (auth()->user()->is_teacher)

 <div class="container-card">


    <div class="card" style="width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">Siswa</h5>
            <hr style="margin: 0">
            <div class="display mt-2">
                <i class="fa-solid fa-users" style="color: #012970; font-size:40px;"></i>
                <div class="desk">
                    <div class="isi-desk">
                    <h1>{{count($siswa)}}</h1>
                    <p>data</p>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">Rayon</h5>
            <hr style="margin: 0">
            <div class="display mt-2">
                <i class="fa-solid fa-map-location-dot" style="color: #012970; font-size:40px;"></i>
                <div class="desk">
                    <div class="isi-desk">
                    <h1>{{ count($grades) }}</h1> 
                    <p>data</p>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

   

    <div class="card" style="width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">Rombel</h5>
            <hr style="margin: 0">
            <div class="display mt-2">
                <i class="fa-solid fa-school" style="color: #012970; font-size:40px;"></i>
                <div class="desk">
                    <div class="isi-desk">
                      {{-- @foreach ($regions as $reg )
                        
                        @endforeach --}}
                        <h1>{{count($regions)}} </h1>
                    <p> data</p>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

   
    

</div>
@else
     <div class="page-content page-container" id="page-content">
          <div class="container ">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project Based Learning</h4>
                  
                    <div class="mt-4">
                      <div class="accordion" id="accordion" role="tablist">
                        <div class="card">
                          <div class="card-header" role="tab" id="heading-1">
                            <h6 class="mb-0">
                              <a data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" data-abc="true" class="collapsed">
                             Apa itu Project Based Learning?
                              </a>
                            </h6>
                          </div>
                          <div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="heading-1" data-parent="#accordion">
                            <div class="card-body">
                              <div class="row" style="display:flex; align-items: center;">
                                <div class="col-3" style="padding-left: 80px">
                                  <img src="{{ asset('assets/img/question.png') }}" class="mw-100 "  style=" max-width: 100%!important; width: 100px; border-radius: 100%;
                                  background: #FFE59E;" alt="image">                              
                                </div>
                                <div class="col-9">
                                  <p class="mb-0">Project Based Learning merupakan website yang di buat khusus untuk laporan harian pekerjaan siswa dengan alur berbasis industri.</p>                          
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab" id="heading-2">
                            <h6 class="mb-0">
                              <a class="collapsed" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2" data-abc="true">
                            Bagaimana cara menggunakan website ini?
                              </a>
                            </h6>
                          </div>
                          <div id="collapse-2" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion">
                            <div class="card-body">
                                <p>Caranya sangat mudah cukup mengikuti langkah-langkah berikut:</p>
                              <ol class="pl-3 mt-4">
                                <li>Jika sudah punya akun, anda bisa langsung login dan mengakses website ini</li>
                                <li>Di menu Pekerjaan / <b> Form </b>, anda bisa mengisi data form pekerjaan, setelah submit, data tersebut akan tampil pada halaman Pekerjaan / <b>Rekap</b> </li>
                                <li>Di menu Pembiasaan / <b> checklist </b>, anda bisa menceklist kegiatan yang sudah di sediakan, setelah submit data tersebut akan tampil pada halaman Pembiasaan /<b> Rekap </b></li>
                              </ol>
                              <br>
                              
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab" id="heading-3">
                            <h6 class="mb-0">
                              <a class="collapsed" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" data-abc="true">
                                Rekap Pekerjaan bulan ini 
                              </a>
                            </h6>
                          </div>
                          <div id="collapse-3" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-parent="#accordion">
                            <div class="card-body">
                           <table class="table" style="width: 60%; margin: 0 auto;">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Total Perbulan Desember 2022</th>
                              </tr>

                          
                            </thead>

                            <tbody>
                              {{-- @foreach ( as )
                                
                              @endforeach --}}
                              <tr>
                                <th scope="row">Pembiasaan</th>
                                <td class="text-center">{{ count($pembiasaan) }}</td>
                              
                              </tr>
                              <tr>
                                <th scope="row">Pekerjaan</th>
                                <td class="text-center">{{ count($job) }}</td>
                              
                              </tr>
                            </tbody>
                            
                           </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    </div>
          
@endif


 

</x-layout>

