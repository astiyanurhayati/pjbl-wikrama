
<x-layout title="welcome">
    @section('subjudul')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                
            </ol>
        </nav>
    </div>
@endsection

 <p class="alert alert-success">Welcome {{ auth()->user()->username }} </p>


 <div class="container-card">


    <div class="card" style="width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">Siswa</h5>
            <hr style="margin: 0">
            <div class="display mt-2">
                <i class="fa-solid fa-users" style="color: orange; font-size:40px;"></i>
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
                <i class="fa-solid fa-map-location-dot" style="color: orange; font-size:40px;"></i>
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
                <i class="fa-solid fa-school" style="color: orange; font-size:40px;"></i>
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


 

</x-layout>

