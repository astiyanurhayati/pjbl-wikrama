@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/app.e4a36eae.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>

<body>
    <div id="container">
        <div class="aside__overlay"></div>
        <div class="aside">
            <div class="aside__links">
                @if (auth()->user()->is_teacher)
                    <a href="{{ route('dashboard.admin') }}" class="aside__wikrama text-decoration-none">
                        <img src="/img/wikrama.png" alt="Wikrama" />
                        <span class="text-dark">WIKRAMA</span>
                    </a>
                    <a class="aside__link {{ Route::currentRouteNamed('dashboard.grades.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.grades.index') }}">
                        <i class="bi bi-person-workspace"></i>
                        Rombel
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.regions.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.regions.index') }}">
                        <i class="bi bi-geo-alt-fill"></i>
                        Rayon
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.categories.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index') }}">
                        <i class="bi bi-pie-chart-fill"></i>
                        Kategori Pembiasaan
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.activities.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.activities.index') }}">
                        <i class="bi bi-pencil-square"></i>
                        Desk. Pembiasaan
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.input-form.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.input-form.index') }}">
                        <i class="bi bi-person-bounding-box"></i>
                        Siswa
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.input-table.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.input-table.index') }}">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        Rekap Hasil
                    </a>
                @else
                    <a class="aside__wikrama text-decoration-none">
                        <img src="/img/wikrama.png" alt="Wikrama" />
                        <span class="text-dark">WIKRAMA</span>
                    </a>
                    <a class="aside__link {{ Route::is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-blockquote-left"></i>
                        Pekerjaan
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.pendidik2.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.pendidik2.index') }}">
                        <i class="bi bi-blockquote-left"></i>
                        Rekap Pekerjaan
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.centang.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.centang.index') }}">
                        <i class="bi bi-clipboard-check"></i>
                        Pembiasaan
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.pendidik.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.pendidik.index') }}">
                        <i class="bi bi-clipboard-check"></i>
                        Rekap Pembiasaan
                    </a>
                @endif
            </div>
        </div>
        <div class="main">
            <nav class="mynav">
                <button class="btn btn-link text-dark mynav__toggle d-lg-none">
                    <i class="bi bi-list fs-3"></i>
                </button>
                <div class="mynav__search">
                    <i class="bi bi-search"></i>
                    <input type="search" name="search" id="search" placeholder="search..." />
                </div>
                <div class="dropdown">
                    <button class="mynav__dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/wikrama.png" alt="" />
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a onclick="event.preventDefault();
                                this.closest('form').submit();"
                                    class="dropdown-item text-danger" href="#">
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    
    {{-- <script src="{{ asset('assets/app.3def9732.js') }}"></script> --}}
    <script>
        $(document).ready(function() {

            $('body').on('click', '#detailJob', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                $.get('pendidik2/' + id, function(data) {
                    document.querySelector('#date-job').innerHTML = new Date(data.data.date)
                        .toLocaleDateString('id-ID', {
                            month: "long",
                            day: "numeric",
                            year: "numeric"
                        });;
                    document.querySelector('#content-job').innerHTML = data.data.content;
                })
            });

        });
    </script>
</body>

</html>
