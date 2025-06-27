@extends('layouts.main')
@section('title', 'Home')
@section('content')
<style>
    .futuristic-home-bg {
        background: radial-gradient(ellipse at top left, #2b2b4b 0%, #0a0a0f 100%);
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .futuristic-home-card {
        background: rgba(30, 30, 60, 0.8);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1.5px solid rgba(255,255,255,0.12);
        padding: 3rem 2.5rem;
        max-width: 600px;
        width: 100%;
        margin: 2rem auto;
        text-align: center;
    }
    .futuristic-home-title {
        font-size: 2.3rem;
        font-weight: 800;
        background: linear-gradient(90deg, #fff 20%, #a259ff 60%, #ff3864 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 1.2em;
        letter-spacing: 1.5px;
    }
    .futuristic-home-desc {
        color: #bdbdf7;
        font-size: 1.2em;
        margin-bottom: 2em;
    }
</style>
<div class="futuristic-home-bg">
    <div class="futuristic-home-card">
        <div class="futuristic-home-title">Welcome to GalleryBox</div>
        <div class="futuristic-home-desc">
            This is Dex's digital space to manage, showcase, and explore amazing photos.<br>
            Use the sidebar to navigate through the gallery, upload new photos, and discover more!
        </div>
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <!-- Add more home content here if needed -->
    </div>
</div>
@endsection
