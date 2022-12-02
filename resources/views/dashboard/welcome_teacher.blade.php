
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

<p class="alert alert-warning w-50">Selamat Datang {{ auth()->user()->username }} </p>



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
                    <h1>190</h1>
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
                    <h1>190</h1>
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
                    <h1>190</h1>
                    <p>data</p>
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
                    <h4 class="card-title">accordion Example</h4>
                    <p class="card-description">Basic Accordian Example</p>
                    <div class="mt-4">
                      <div class="accordion" id="accordion" role="tablist">
                        <div class="card">
                          <div class="card-header" role="tab" id="heading-1">
                            <h6 class="mb-0">
                              <a data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" data-abc="true" class="collapsed">
                                How to download  Adobe reader?
                              </a>
                            </h6>
                          </div>
                          <div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="heading-1" data-parent="#accordion">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-3">
                                  <img src="https://img.icons8.com/bubbles/100/000000/administrator-male.png" class="mw-100" alt="image">                              
                                </div>
                                <div class="col-9">
                                  <p class="mb-0">For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.</p>                          
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab" id="heading-2">
                            <h6 class="mb-0">
                              <a class="collapsed" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2" data-abc="true">
                              How to convert a png to pdf using adobe reader
                              </a>
                            </h6>
                          </div>
                          <div id="collapse-2" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion">
                            <div class="card-body">
                                <p>For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.</p>
                              <ol class="pl-3 mt-4">
                                <li>connection and try again</li>
                                <li>correct while signing in</li>
                                <li>your account is accessible in your region</li>
                              </ol>
                              <br>
                              <p class="text-success">
                                <i class="mdi mdi-alert-octagon mr-2"></i>you can contact our support.
                              </p>
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
                           <table class="table">
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
                                <td>{{ count($pembiasaan) }}</td>
                              
                              </tr>
                              <tr>
                                <th scope="row">Pekerjaan</th>
                                <td>{{ count($job) }}</td>
                              
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

