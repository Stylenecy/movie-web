@extends('layouts.main')
@section('title', 'Change Password')
@section('content')
<style>
    .futuristic-pass-bg {
        background: radial-gradient(ellipse at top left, #2b2b4b 0%, #0a0a0f 100%);
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .futuristic-pass-card {
        background: rgba(30, 30, 60, 0.85);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 #a259ff55, 0 0 24px 2px #ff386455;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1.5px solid #a259ff55;
        padding: 2.7rem 2.2rem 2.2rem 2.2rem;
        max-width: 420px;
        width: 100%;
        margin: 2rem auto;
        text-align: center;
        position: relative;
        animation: glowFadeIn 1.2s cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes glowFadeIn {
        0% { box-shadow: 0 0 0 0 #a259ff00, 0 0 0 0 #ff386400; opacity: 0; }
        100% { box-shadow: 0 8px 32px 0 #a259ff55, 0 0 24px 2px #ff386455; opacity: 1; }
    }
    .futuristic-pass-title {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(90deg, #fff 20%, #a259ff 60%, #ff3864 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 1.2em;
        letter-spacing: 1.5px;
    }
    .futuristic-pass-form .form-control {
        background: rgba(30, 30, 60, 0.7);
        border: 1.5px solid #a259ff;
        color: #fff;
        border-radius: 2em;
        padding: 0.8em 1.2em;
        font-size: 1.1em;
        margin-bottom: 1.1em;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
        box-shadow: 0 0 0 0 #a259ff00;
    }
    .futuristic-pass-form .form-control:focus {
        border: 1.5px solid #ff3864;
        box-shadow: 0 0 12px #ff3864aa;
        background: rgba(30, 30, 60, 0.9);
    }
    .futuristic-pass-form .btn-primary {
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        color: #fff;
        border: none;
        border-radius: 2em;
        padding: 0.8em 2em;
        font-weight: 700;
        font-size: 1.1em;
        box-shadow: 0 2px 16px #a259ff33, 0 0 8px #ff386455;
        transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
        width: 100%;
        margin-top: 0.5em;
    }
    .futuristic-pass-form .btn-primary:hover {
        background: linear-gradient(90deg, #ff3864 0%, #a259ff 100%);
        box-shadow: 0 4px 24px #ff386455, 0 0 16px #a259ff77;
        transform: translateY(-2px) scale(1.03);
    }
    .futuristic-pass-info {
        color: #bdbdf7;
        margin-bottom: 1.2em;
        font-size: 1em;
        text-align: center;
    }
</style>
<div class="futuristic-pass-bg">
    <div class="futuristic-pass-card">
        <div class="futuristic-pass-title">Change Password</div>
        @if (session('info'))
            <div class="futuristic-pass-info">{{ session('info') }}</div>
        @endif
        <form action="/updatepass" method="post" class="futuristic-pass-form">
            @csrf
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="New Password" required>
            </div>
            <div class="form-group">
                <input type="password" name="konfirmasi_password" class="form-control" placeholder="Confirm New Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
