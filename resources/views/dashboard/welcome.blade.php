<x-layout title="Dashboard">
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

<p class="alert alert-success">Selamat Datang {{ auth()->user()->username }} </h1>
    
</x-layout>