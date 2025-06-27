<!doctype html>
<html lang="en">
@php if (!isset($key)) $key = ''; @endphp
@php
    $isGuest = !Auth::check();
@endphp
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
    <style>
        body {
            background: #0a0a0f !important;
        }
        .futuristic-topbar {
            background: linear-gradient(90deg, #1a1a2e 60%, #a259ff 100%);
            box-shadow: 0 2px 16px #a259ff33;
            border-bottom: 1.5px solid #a259ff44;
            padding: 0.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .futuristic-user {
            color: #fff;
            font-weight: 600;
            background: rgba(30,30,60,0.7);
            border-radius: 2em;
            padding: 0.3em 1.2em;
            margin-left: auto;
            transition: background 0.2s;
        }
        .futuristic-user:hover, .futuristic-user:focus {
            background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
            color: #fff;
        }
        .futuristic-sidebar {
            background: rgba(30,30,60,0.7);
            border-radius: 2em;
            margin: 2.5em 0 2.5em 1.5em;
            padding: 2em 1em 2em 1em;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.17);
            min-width: 170px;
            max-width: 200px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        .futuristic-sidebar .nav-link {
            color: #bdbdf7;
            font-weight: 600;
            border-radius: 1.5em;
            margin-bottom: 0.7em;
            padding: 0.8em 1.2em;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            font-size: 1.1em;
            letter-spacing: 1px;
        }
        .futuristic-sidebar .nav-link.active, .futuristic-sidebar .nav-link:hover {
            background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
            color: #fff !important;
            box-shadow: 0 2px 16px #a259ff33;
        }
        .main-content-futuristic {
            margin: 0 auto;
            padding: 2.5em 0 2.5em 0;
            max-width: 1100px;
            min-height: 90vh;
        }
        @media (max-width: 900px) {
            .main-content-futuristic {
                max-width: 100vw;
                padding: 1em 0.5em;
            }
            .futuristic-sidebar {
                min-width: 100px;
                max-width: 120px;
                padding: 1em 0.5em;
            }
        }
        @media (max-width: 600px) {
            .futuristic-sidebar {
                display: none;
            }
            .main-content-futuristic {
                padding: 0.5em 0.2em;
            }
        }
        .toast-futuristic {
            background: rgba(30, 30, 60, 0.95);
            color: #fff;
            border-radius: 1.2em;
            box-shadow: 0 2px 16px #a259ff33, 0 0 8px #ff386455;
            border: 1.5px solid #a259ff55;
            padding: 1em 1.5em;
            margin-bottom: 0.7em;
            font-size: 1.08em;
            display: flex;
            align-items: center;
            animation: toastFadeIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
        }
        @keyframes toastFadeIn {
            0% { opacity: 0; transform: translateY(30px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
    </style>
</head>

<body>
    <div class="futuristic-topbar">
        <div class="dropdown">
            <a class="futuristic-user dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-person"></i> {{ Auth::check() ? Auth::user()->name : "Guest" }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                @if(Auth::check())
                    <a class="dropdown-item" href="/profile"><i class="bi bi-person-circle"></i> Profile</a>
                    <a class="dropdown-item" href="/ubahpass"><i class="bi bi-gear"></i> Settings</a>
                    <a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
                @else
                    <a class="dropdown-item" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                @endif
            </div>
        </div>
        @if($isGuest)
            <nav class="nav d-inline-flex ml-3">
                <a class="nav-link {{ (request()->is('/') || request()->is('catalog')) ? 'active':''}}" href="/catalog"><i class="bi bi-grid"></i> Catalog</a>
                <a class="nav-link {{ (request()->is('login')) ? 'active':''}}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </nav>
        @endif
    </div>
    <div class="container-fluid" style="background: none;">
        <div class="row" style="margin: 0;">
            @if(!$isGuest)
            <div class="col-auto p-0 d-none d-md-block">
                <div class="futuristic-sidebar">
                    <a class="nav-link {{ (request()->is('/') || request()->is('catalog')) ? 'active':''}}" role="tab" href="/catalog"><i class="bi bi-grid"></i> Catalog</a>
                    <a class="nav-link {{ ($key == 'photo') ? 'active':''}}" role="tab" href="{{ route('photos.index') }}"><i class="bi bi-images"></i> Photos</a>
                    <a class="nav-link {{ (request()->is('profile')) ? 'active':''}}" href="/profile"><i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
            @endif
            <div class="col main-content-futuristic">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Toast Notification -->
    <div aria-live="polite" aria-atomic="true" style="position: fixed; bottom: 2em; right: 2em; z-index: 9999;">
        @if(session('success'))
            <div id="toast-success" class="toast-futuristic show" role="alert" style="min-width: 260px;">
                <div class="toast-body">
                    <i class="bi bi-check-circle-fill" style="color:#00ffb3;font-size:1.3em;"></i>
                    <span style="margin-left:0.7em;">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div id="toast-error" class="toast-futuristic show" role="alert" style="min-width: 260px;">
                <div class="toast-body">
                    <i class="bi bi-x-circle-fill" style="color:#ff3864;font-size:1.3em;"></i>
                    <span style="margin-left:0.7em;">{{ session('error') }}</span>
                </div>
            </div>
        @endif
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
        // Auto-hide toast after 3.5 seconds
        setTimeout(function() {
            var toast = document.querySelector('.toast-futuristic');
            if (toast) {
                toast.classList.remove('show');
                toast.style.opacity = 0;
            }
        }, 3500);
    </script>
</body>
</html>
