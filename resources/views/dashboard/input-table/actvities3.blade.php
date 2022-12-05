
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">

<x-layout>
  @section('subjudul')
  <div class="pagetitle">
      <h1>Formulir PJBL</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Rekap Hasil </li>
        </ol>
      </nav>
    </div>
  @endsection


<div class="card">
  <div class="card-header" style="color: black">
    <select class="form-select w-25 mb-3 mt-2"  aria-label="Default select example">
      <option selected>Open this select menu</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>
    <section class="intro">
      <div class="gradient-custom-1 h-100">
        <div class="mask d-flex ">
          <div class="container">
            
            <div class="row justify-content-center">
              <div class="col-12">
                <div class=" table table-responsive-xl bg-white">
                  <table class="table mb-0 table-custom">
                    <thead>
                      <tr>
                        <th class="th">No</th>
                        <th>Rombel</th>
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

