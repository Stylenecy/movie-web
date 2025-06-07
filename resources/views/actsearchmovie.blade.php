<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>.:Result Movies:.</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-4 bg-info"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($data as $d)
                        <div class="col-md-12">
                            <div class="card-mb-4">
                                @if ($d->poster)
                                    <img src="{{ asset('/storage/'.$d->poster) }}" alt="{{ $d->poster }}"
                                    class="card-img-top" width="10px">
                                @else
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                    alt="No Image" class="card-img-top" width="10px"></td>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $d->title }}</h5>
                                    <h5 class="card-title">{{ $d->genre }}</h5>
                                    <h5 class="card-title">{{ $d->year }}</h5>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
