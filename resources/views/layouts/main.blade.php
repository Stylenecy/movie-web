<!doctype html>
<html lang="en">
@section('title', 'Main')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">

    <title>Website - @yield('title')</title>
</head>

<body>
    <div class="container-fluid">
        <!-- Baris Pertama -->
        <div class="row">
            <div class="col-md-12 bg-primary py-2">
                <div class="dropdown float-right">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="bi bi-person"></i> User
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">
                        <div class="media">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRw_y9Y5gMYdkGTz7ZSHUeyOH9eDuVd6Bo7GA&s" height="50" width="80" class="align-self-center mr-3" alt="...">
                            <div class="media-body">
                              <h5 class="mt-0"> {{ Auth::user()->nama ?? "No user"}}</h5>
                              <small><p class="mb-0"><i class="bi bi-clock"></i>  Pkl 18:00 WIB</p></small>
                            </div>
                          </div>
                      </a>
                      <a class="dropdown-item" href="/ubahpass"><i class="bi bi-gear"></i> Settings</a>
                      <a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
                    </div>
                  </div>
            </div>
        </div>

        <!-- Baris Kedua -->
        <div class="row">
            <div class="col-xl-3-bg vh-100 border">
                <div class="nav flex-column nav-pills pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{ ($key == 'home') ? 'active':''}}" role="tab" href="/home">Home</a>
                    <a class="nav-link {{ ($key == 'movie') ? 'active':''}}" role="tab" href="/movie">Data Movie</a>
                    <a class="nav-link {{ ($key == 'kategori') ? 'active':''}}" role="tab" href="/kategori" >Data Kategori</a>
                    <a class="nav-link" role="tab" href="/genre">Data Genre</a>
                    <!-- <a class="nav-link" href="/kategori/form">Form Kategori</a> -->
                  </div>
            </div>
            <div class="col-md-9 bg vh-100 border">
                @yield('content')
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-12 bg-primary py-3"></div>
        </div> -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>
