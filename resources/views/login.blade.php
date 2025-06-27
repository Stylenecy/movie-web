<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login - GalleryBox</title>
    <style>
      body {
        min-height: 100vh;
        background: radial-gradient(ellipse at top left, #2b2b4b 0%, #0a0a0f 100%);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .futuristic-login-card {
        background: rgba(30, 30, 60, 0.8);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1.5px solid rgba(255,255,255,0.12);
        padding: 2.5rem 2.2rem 2rem 2.2rem;
        max-width: 370px;
        width: 100%;
        margin: 0 auto;
      }
      .futuristic-login-title {
        font-size: 2.1rem;
        font-weight: 800;
        background: linear-gradient(90deg, #fff 20%, #a259ff 60%, #ff3864 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        text-align: center;
        margin-bottom: 1.2em;
        letter-spacing: 1.5px;
      }
      .futuristic-login-logo {
        display: block;
        margin: 0 auto 1.5em auto;
        border-radius: 1.5em;
        box-shadow: 0 2px 16px #a259ff33;
        width: 110px;
        height: 110px;
        object-fit: cover;
      }
      .futuristic-login-form .form-control {
        background: rgba(30, 30, 60, 0.7);
        border: 1.5px solid #a259ff;
        color: #fff;
        border-radius: 2em;
        padding: 0.8em 1.2em;
        font-size: 1.1em;
        margin-bottom: 1.1em;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
      }
      .futuristic-login-form .form-control:focus {
        border: 1.5px solid #ff3864;
        box-shadow: 0 0 8px #ff3864aa;
        background: rgba(30, 30, 60, 0.9);
      }
      .futuristic-login-form .btn-primary {
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        color: #fff;
        border: none;
        border-radius: 2em;
        padding: 0.8em 2em;
        font-weight: 700;
        font-size: 1.1em;
        box-shadow: 0 2px 16px #a259ff33;
        transition: background 0.2s, box-shadow 0.2s;
        width: 100%;
      }
      .futuristic-login-form .btn-primary:hover {
        background: linear-gradient(90deg, #ff3864 0%, #a259ff 100%);
        box-shadow: 0 4px 24px #ff386455;
      }
      .futuristic-login-footer {
        color: #bdbdf7;
        text-align: center;
        margin-top: 1.5em;
        font-size: 1em;
      }
    </style>
  </head>
  <body>
    <div class="futuristic-login-card">
      <div class="futuristic-login-title">GalleryBox</div>
      <img class="futuristic-login-logo" src="https://img.favpng.com/24/10/1/creative-color-logo-design-png-favpng-36ifYrN9YRCYdPJYtW19FxAZw.jpg" alt="Logo">
      <form action="/ceklogin" method="post" class="futuristic-login-form">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Masukkan E-Mail" required>
        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <div class="futuristic-login-footer">
        &copy; {{ date('Y') }} GalleryBox. All rights reserved.
      </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
  </body>
</html>
