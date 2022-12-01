
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">


<x-layout title="Soal">
    @section('subjudul')
<div class="pagetitle">
    <h1>Deskripsi Pembiasaan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Kategori </li>
      </ol>
    </nav>
  </div>
@endsection

<div class="card">
  <div class="card-header" style="color: black">
    Tabel Deskipsi Pembiasaan
  </div>
    <section class="intro">
      <div class="gradient-custom-1 h-100">
        <div class="mask d-flex ">
          <div class="container">
            <div class="tombol-kiri">
              <div></div>
              <button class="btn btn-success">+ Deskripsi </button>
            </div>
            <div class="row justify-content-center">
              <div class="col-12">
                <div class=" table table-responsive-xl bg-white">
                  <table class="table mb-0 table-custom">
                    <thead>
                      <tr>
                        <th class="th">No</th>
                        <th style="min-width: 250px">Rombel</th>
                        <th  colspan="2" class="text-center">Aksi</th>
                      </tr>
                    
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td>System Architect Lorem ipsum dolor sit </td>
                        <td style="text-align: center; width: 50px;">
                          <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        </td><td style="text-align: center; width: 50px;">
                          <a href=""><i class="fa-solid fa-trash text-danger"></i></i></a>
                        </td> 
                      </tr>
                      <tr>
                          <td class="text-center">1</td>
                          <td>System Architect kire</td>
                          <td style="text-align: center">
                            <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                          </td><td style="text-align: center">
                            <a href=""><i class="fa-solid fa-trash text-danger"></i></a>
                          </td> 
                        </tr>
                      
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