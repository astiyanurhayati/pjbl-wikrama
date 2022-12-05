


<x-layout title="Dashboard">
  <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
  @section('subjudul')
  <div class="pagetitle">
      <h1>Manage Rombel</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Rombel</li>
        </ol>
      </nav>
    </div>
  @endsection

  @if (session()->has('success'))
  <div class="alert alert-success mt-3" role="alert">
      {{ session('success') }}
  </div>
  @endif
  <div class="tombol">
    <div></div>
 <a href="{{ url('dashboard/grades/create') }}"> <button class="btn btn-success hover" style="margin-right: 13px; border: none;" >+ Rombel </button></a>
  </div>
<div class="card pt-3">
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
                      <th>Rombel</th>
                      <th  colspan="2" class="text-center">Aksi</th>
                    </tr>
                   
                  </thead>
                  <tbody>
                    @forelse ($grades as $grade)
                      <tr>
                        <input type="hidden" class="delete_id" value="{{ $grade->id }}">
                        <td class="text-center">  {{ $loop->iteration }}</td>
                        <td>{{ $grade->name }} </td>
                        <td style="text-align: center; width: 50px;">
                          {{-- edit --}}
                          <a href="{{ route('dashboard.grades.edit', $grade->id) }}" class="text-blue">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        </td>
                        <td style="text-align: center; width: 50px;">
                         {{-- delete --}}
                          <form action="{{ route('dashboard.grades.destroy', $grade->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a onclick="event.preventDefault();
                        this.closest('form').submit();"
                                href="{{ route('dashboard.grades.destroy', $grade->id) }}"
                                class="text-danger btndelete">
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