<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- font awose --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/al  l.min.css">

    <!-- css untuk select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    {{-- jquery --}}
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    
    
</head>

<body>
    
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        
        <div class="d-flex align-items-center justify-content-between jarak">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center mx-3">
                <img src="{{ asset('assets/img/wikrama.png') }}" alt="">
                
                <span class="d-none d-lg-block">Wikrama</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->
        
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-circle-user" style="font-size: 25px"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"> {{ auth()->user()->username }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                        <li class="dropdown-header">
                            <h6> Hallo! {{ auth()->user()->username }}</h6>
                            
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        
                        
                        <li style="cursor: pointer">
                            <form action="{{ route('logout') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a onclick="event.preventDefault(); this.closest('form').submit();">
                                    <p class="text-center" style="    margin-bottom: 0; padding: 5px 0px;">
                                        <i class="fa-solid fa-right-from-bracket"></i> Logout</p>
                                    </a>
                                </form>
                            </li>
                            
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->
            
        </header><!-- End Header -->
        
        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            
            <ul class="sidebar-nav" id="sidebar-nav">
                
                @if (auth()->user()->is_teacher)
                <li class="nav-item">
                    <a class="nav-link  {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                
                <li class="nav-item ">
                    <a class="nav-link  collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a  class="{{ (request()->is('dashboard/grades')) ? 'active' : '' }}" href="{{ url('dashboard/grades') }}">
                                <i class="bi bi-circle"></i><span>Rombel</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ (request()->is('dashboard/regions')) ? 'active' : '' }}" href="{{ url('dashboard/regions') }}">
                                <i class="bi bi-circle"></i><span>Rayon</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                
                <li class="nav-item">
                    <a class="nav-link collapsed {{ Route::is('dashboard.categories.*') ? 'active' : '' }}" href="{{ url('/dashboard/categories') }} ">
                        <i class="fa-regular fa-bookmark"></i>
                        <span>Kategori Pembiasaan</span>
                    </a>
                </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Route::is('dashboard.activities.*') ? 'active' : '' }} " href="{{ route('dashboard.activities.index') }}">
                    <i class="far fa-list-alt"></i>
                    <span>Desk Pembiasaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Route::is('dashboard.input-form.*') ? 'active' : '' }}" href="{{ route('dashboard.input-form.index') }}">
                    <i class="far fa-address-book"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed  {{ Route::is('dashboard.input-table.*') ? 'active' : '' }}" href="{{ route('dashboard.input-table.index') }}">
                    <i class="fa-brands fa-readme"></i><span>Rekap Hasil</span>
                </a>
            </li>
            
            
            @else
            
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            {{-- Pekerjaan --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Pekerjaan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{(request()->is('student/form')) ? 'active' : '' }}" href="{{ url('/student/form') }}">
                            <i class="bi bi-circle"></i><span>Form</span>
                        </a>
                    </li>
                    <li>
                        <a class=" {{ Route::is('dashboard.pendidik2.*') ? 'active' : '' }}" href="{{ route('dashboard.pendidik2.index') }}">
                            <i class="bi bi-circle"></i><span>Rekap</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Pekerjaan --}}
            
            
            {{-- Pembiasaan --}}
            <li class="nav-item">
                <a class="nav-link collapsed " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Pembiasaan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a class=" {{ Route::is('dashboard.centang.*') ? 'active' : '' }}" href="{{ route('dashboard.centang.index') }}">
                            <i class="bi bi-circle"></i><span>Checklist</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::is('dashboard.pendidik.*') ? 'active' : '' }}" href="{{ route('dashboard.pendidik.index') }}">
                            <i class="bi bi-circle"></i><span>Rekap</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            {{-- End Pembiasaan --}}
            
        </ul>
        @endif
    </aside><!-- End Sidebar-->
    
    <main id="main" class="main">
        @yield('subjudul')
        <section class="section dashboard">
            {{ $slot }}
        </section>
        
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <!-- Vendor JS Files  (untuk modal mucul)-->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/app.3def9732.js') }}"></script>
    <script>
        $(document).ready(function() {
            
            $('body').on('click', '#detailJob', function(event) {
                
                event.preventDefault();
                var id = $(this).data('id');
                $.get('pendidik2/' + id, function(data) {
                    document.querySelector('#date-job').innerHTML = new Date(data.data.date)
                        .toLocaleDateString('id-ID', {
                            month: "long"
                            , day: "numeric"
                            , year: "numeric"
                        });;
                    document.querySelector('#content-job').innerHTML = data.data.content;
                })
            });

        });

        </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

{{-- link dashboard card siswa --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<!-- js untuk select2  -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
      $("#rombel").select2({
          placeholder: "Please Select"
      });
  });
</script>



</html>
