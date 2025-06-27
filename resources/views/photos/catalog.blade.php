@extends('layouts.main')
@section('title', 'Photo Catalog')
@section('content')
@php use Illuminate\Support\Carbon; @endphp
<style>
    body, .container-fluid {
        background: #0a0a0f !important;
        min-height: 100vh;
    }
    .catalog-hero {
        background: linear-gradient(120deg, #2b2b4b 0%, #a259ff 60%, #ff3864 100%);
        border-radius: 2.5rem;
        box-shadow: 0 8px 32px 0 #a259ff33, 0 0 24px 2px #ff386455;
        padding: 2.5rem 2rem 2rem 2rem;
        margin: 2rem auto 2.5rem auto;
        max-width: 1100px;
        width: 100%;
        text-align: center;
        position: relative;
        animation: fadeInDown 1.1s cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes fadeInDown {
        0% { opacity: 0; transform: translateY(-40px) scale(0.98); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .catalog-title {
        font-size: 2.8rem;
        font-weight: 900;
        background: linear-gradient(90deg, #fff 20%, #a259ff 50%, #ff3864 80%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        letter-spacing: 2px;
        margin-bottom: 0.3em;
        margin-top: 0.2em;
        text-shadow: 0 2px 16px #a259ff33;
    }
    .catalog-subtitle {
        color: #fff;
        text-align: center;
        margin-bottom: 2em;
        font-size: 1.2rem;
        font-weight: 500;
        text-shadow: 0 2px 8px #a259ff33;
    }
    .catalog-search-bar {
        display: flex;
        justify-content: center;
        margin-bottom: 2.5em;
        animation: fadeInUp 1.2s cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px) scale(0.98); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .catalog-search-bar input[type="text"] {
        background: rgba(30, 30, 60, 0.85);
        border: 2px solid #a259ff;
        color: #fff;
        border-radius: 2em;
        padding: 0.9em 2em;
        font-size: 1.15em;
        margin-right: 0.7em;
        outline: none;
        font-weight: 600;
        box-shadow: 0 2px 16px #a259ff33;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .catalog-search-bar input[type="text"]:focus {
        border: 2px solid #ff3864;
        box-shadow: 0 0 12px #ff3864cc;
    }
    .catalog-search-bar button {
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        color: #fff;
        border: none;
        border-radius: 2em;
        padding: 0.9em 2.2em;
        font-weight: 700;
        font-size: 1.15em;
        box-shadow: 0 2px 16px #a259ff33;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .catalog-search-bar button:hover {
        background: linear-gradient(90deg, #ff3864 0%, #a259ff 100%);
        box-shadow: 0 4px 24px #ff386455;
    }
    .catalog-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 2.2rem;
        justify-content: center;
        animation: fadeInUp 1.2s cubic-bezier(.68,-0.55,.27,1.55);
    }
    .catalog-card {
        background: rgba(30, 30, 60, 0.85);
        border-radius: 1.7rem;
        box-shadow: 0 8px 32px 0 #a259ff33, 0 0 24px 2px #ff386455;
        border: 1.5px solid #a259ff55;
        overflow: hidden;
        position: relative;
        width: 270px;
        min-width: 220px;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        transition: transform 0.22s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.22s;
        animation: cardPopIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes cardPopIn {
        0% { opacity: 0; transform: scale(0.92) translateY(30px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    .catalog-card:hover {
        transform: translateY(-10px) scale(1.04) rotateZ(-1deg);
        box-shadow: 0 16px 40px 0 #a259ff77, 0 0 32px 4px #ff386455;
        border: 2px solid #ff3864;
    }
    .catalog-card img {
        border-radius: 1.7rem 1.7rem 0 0;
        width: 100%;
        height: 200px;
        object-fit: cover;
        box-shadow: 0 2px 16px #a259ff33;
        transition: filter 0.2s;
    }
    .catalog-card:hover img {
        filter: brightness(1.1) saturate(1.2) drop-shadow(0 0 12px #ff3864cc);
    }
    .catalog-card .card-body {
        color: #fff;
        padding: 1.2rem 1rem 1.5rem 1rem;
        width: 100%;
        text-align: left;
    }
    .catalog-card .card-title {
        font-size: 1.2rem;
        font-weight: 700;
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }
    .catalog-card .card-text {
        color: #bdbdf7;
        font-size: 1rem;
        min-height: 48px;
    }
    .catalog-card .card-date {
        color: #a259ff;
        font-size: 0.95em;
        margin-top: 0.5em;
        font-weight: 600;
    }
    .catalog-no-results {
        color: #fff;
        background: rgba(30, 30, 60, 0.85);
        border-radius: 1.5em;
        padding: 2em 2em;
        text-align: center;
        font-size: 1.3em;
        font-weight: 700;
        margin-top: 2em;
        box-shadow: 0 2px 16px #a259ff33;
        animation: fadeInUp 1.2s cubic-bezier(.68,-0.55,.27,1.55);
    }
    /* Modal Styles */
    .modal-content.futuristic-modal {
        background: rgba(30, 30, 60, 0.97);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 #a259ff55, 0 0 24px 2px #ff386455;
        border: 1.5px solid #a259ff55;
        color: #fff;
        padding: 0;
        overflow: hidden;
        animation: glowFadeIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
    }
    .modal-header {
        border-bottom: none;
        background: none;
        padding-bottom: 0;
    }
    .modal-title {
        font-size: 1.5rem;
        font-weight: 700;
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
    }
    .modal-body {
        padding: 2rem 2rem 1.5rem 2rem;
        text-align: center;
    }
    .modal-photo-img {
        width: 100%;
        max-width: 420px;
        height: auto;
        border-radius: 1.5rem;
        margin-bottom: 1.2em;
        box-shadow: 0 2px 16px #a259ff33;
    }
    .modal-description {
        color: #bdbdf7;
        font-size: 1.1em;
        margin-top: 0.7em;
    }
    .modal-date {
        color: #a259ff;
        font-size: 0.98em;
        margin-top: 0.5em;
        font-weight: 600;
    }
    .close {
        color: #fff;
        opacity: 1;
        font-size: 2rem;
        text-shadow: none;
        transition: color 0.2s;
    }
    .close:hover {
        color: #ff3864;
    }
    @media (max-width: 900px) {
        .catalog-hero { padding: 1.2rem 0.5rem; }
        .catalog-grid { gap: 1.2rem; }
        .catalog-card { width: 98vw; min-width: 0; }
    }
    @media (max-width: 600px) {
        .catalog-hero { padding: 0.7rem 0.2rem; }
        .catalog-title { font-size: 2rem; }
        .catalog-card img { height: 140px; }
    }
</style>
<div class="catalog-hero">
    <div class="catalog-title">Welcome to the Future of Photo Catalog</div>
    <div class="catalog-subtitle">Discover and search amazing photos in a stunning futuristic gallery.</div>
    <form method="GET" action="{{ route('photos.catalog') }}" class="catalog-search-bar">
        <input type="text" name="q" placeholder="Search photos..." value="{{ request('q') }}">
        <button type="submit"><i class="bi bi-search"></i> Search</button>
    </form>
</div>
<div class="container">
    @if($photos->isEmpty())
        <div class="catalog-no-results">No photos found. Try a different search!</div>
    @else
        <div class="catalog-grid">
            @foreach ($photos as $photo)
                <div class="catalog-card" onclick="showPhotoModal('{{ addslashes($photo->title) }}', '{{ addslashes($photo->description) }}', '{{ asset($photo->file_path) }}', '{{ $photo->created_at ? $photo->created_at->format('d M Y, H:i') : '' }}')">
                    <img src="{{ asset($photo->file_path) }}" alt="{{ $photo->title }}">
                    <div class="card-body">
                        <div class="card-title">{{ $photo->title }}</div>
                        <div class="card-text">{{ $photo->description }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<!-- Photo Details Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content futuristic-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="photoModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="modalPhotoImg" class="modal-photo-img" src="" alt="Photo Preview">
        <div class="modal-description" id="modalPhotoDesc"></div>
        <div class="modal-date" id="modalPhotoDate"></div>
      </div>
    </div>
  </div>
</div>
<script>
    function showPhotoModal(title, description, imgSrc, date) {
        var modal = $('#photoModal');
        modal.find('.modal-title').text(title || 'No Title');
        if (imgSrc) {
            modal.find('#modalPhotoImg').attr('src', imgSrc).attr('alt', title);
        } else {
            modal.find('#modalPhotoImg').attr('src', 'https://via.placeholder.com/420x300?text=No+Image').attr('alt', 'No Image');
        }
        modal.find('#modalPhotoDesc').text(description || 'No description available.');
        modal.find('#modalPhotoDate').text(date ? 'Uploaded on: ' + date : '');
        modal.modal('show');
    }
    // Animate cards on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.catalog-card');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'scale(1) translateY(0)';
                } else {
                    entry.target.style.opacity = 0;
                    entry.target.style.transform = 'scale(0.92) translateY(30px)';
                }
            });
        }, { threshold: 0.1 });
        cards.forEach(card => {
            card.style.opacity = 0;
            card.style.transform = 'scale(0.92) translateY(30px)';
            observer.observe(card);
        });
    });
</script>
@endsection
