@extends('layout.app')

@section('title', 'Berita')

@section('content')

<style>
:root {
    --primary-color: #f59e0b;
    --primary-dark: #d97706;
    --primary-light: #fbbf24;
    --accent-color: #ea580c;
    --text-dark: #78350f;
    --text-gray: #92400e;
    --text-light: #a16207;
    --bg-light: #fffbeb;
    --bg-white: #ffffff;
    --border-color: #fde68a;
    --shadow-sm: 0 1px 3px rgba(245,158,11,.08);
    --shadow-md: 0 4px 12px rgba(245,158,11,.08);
    --shadow-lg: 0 10px 30px rgba(245,158,11,.12);
}

/* ================= BLOG CARD ================= */
.blog-card {
    background: var(--bg-white);
    border-radius: 16px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: all .3s cubic-bezier(.4,0,.2,1);
}

.blog-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-light);
}

/* ================= IMAGE ================= */
.post-img {
    width: 100%;
    height: 240px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
}

.post-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.4), transparent 50%);
    opacity: 0;
    transition: opacity .3s ease;
}

.blog-card:hover .post-img::after {
    opacity: 1;
}

.post-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform .5s cubic-bezier(.4,0,.2,1);
}

.blog-card:hover .post-img img {
    transform: scale(1.08);
}

/* ================= CARD BODY ================= */
.blog-card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

/* ================= META ================= */
.meta-top {
    margin-bottom: 12px;
}

.meta-top ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    gap: 16px;
    font-size: 13px;
    color: var(--text-light);
}

.meta-top ul li {
    display: flex;
    align-items: center;
    gap: 6px;
}

.meta-top ul li i {
    color: var(--primary-color);
}

/* ================= TITLE ================= */
.blog-card .title {
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 12px;
    line-height: 1.4;
}

.blog-card .title a {
    color: var(--text-dark);
    text-decoration: none;
    transition: color .2s ease;
}

.blog-card .title a:hover {
    color: var(--primary-color);
}

/* ================= CONTENT ================= */
.blog-card .content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.blog-card .content p {
    font-size: 14.5px;
    color: var(--text-gray);
    line-height: 1.6;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ================= READ MORE ================= */
.blog-card .read-more {
    margin-top: auto;
}

.blog-card .read-more a {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 10px 20px;
    border-radius: 10px;
    background: var(--primary-color);
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s ease;
    box-shadow: 0 2px 8px rgba(245, 158, 11, .25);
}

.blog-card .read-more a:hover {
    background: var(--primary-dark);
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, .35);
}

/* ================= PAGE TITLE ================= */
.page-title {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #ea580c 100%);
    padding: 80px 0 60px;
    margin-bottom: 60px;
}

.page-title h1 {
    color: #fff;
    font-size: 42px;
    font-weight: 800;
    margin-top: 12px;
}

.page-title .breadcrumbs ol {
    display: flex;
    gap: 10px;
    padding: 0;
    margin: 0;
    list-style: none;
}

.page-title .breadcrumbs ol li {
    color: rgba(255,255,255,.85);
    font-size: 14px;
}

.page-title .breadcrumbs ol li a {
    color: #fff;
    text-decoration: none;
    transition: opacity .2s;
}

.page-title .breadcrumbs ol li a:hover {
    opacity: .8;
}

.page-title .breadcrumbs ol li::after {
    content: '/';
    margin-left: 10px;
    color: rgba(255,255,255,.6);
}

.page-title .breadcrumbs ol li:last-child::after {
    display: none;
}

/* ================= SIDEBAR ================= */
.sidebar {
    position: sticky;
    top: 100px;
}

.widget-item {
    background: var(--bg-white);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 28px;
    margin-bottom: 24px;
    box-shadow: var(--shadow-sm);
}

.widget-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-color);
    display: inline-block;
}

/* SEARCH WIDGET */
.search-widget form {
    display: flex;
    gap: 8px;
}

.search-widget input {
    flex: 1;
    padding: 12px 16px;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    font-size: 14px;
    transition: all .2s ease;
}

.search-widget input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(245, 158, 11, .1);
}

.search-widget button {
    padding: 12px 20px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all .2s ease;
}

.search-widget button:hover {
    background: var(--primary-dark);
    transform: scale(1.05);
}

/* RECENT POSTS */
.recent-post-item {
    display: flex;
    gap: 14px;
    padding: 16px;
    margin: 0 -16px 12px;
    text-decoration: none;
    color: inherit;
    border-radius: 12px;
    transition: all .2s ease;
}

.recent-post-item:last-child {
    margin-bottom: 0;
}

.recent-post-item:hover {
    background: var(--bg-light);
    transform: translateX(4px);
}

.recent-post-item img {
    width: 90px;
    height: 70px;
    object-fit: cover;
    border-radius: 10px;
    flex-shrink: 0;
    box-shadow: var(--shadow-sm);
}

.recent-post-item h4 {
    font-size: 14.5px;
    font-weight: 600;
    margin-bottom: 6px;
    color: var(--text-dark);
    line-height: 1.4;
    transition: color .2s ease;
}

.recent-post-item:hover h4 {
    color: var(--primary-color);
}

.recent-post-item time {
    font-size: 12px;
    color: var(--text-light);
    display: flex;
    align-items: center;
    gap: 4px;
}

.recent-post-item time::before {
    content: '📅';
    font-size: 11px;
}

/* PAGINATION */
.pagination {
    gap: 8px;
    margin-top: 50px;
}

.page-link {
    border-radius: 10px !important;
    color: var(--text-gray);
    padding: 10px 16px;
    border: 1px solid var(--border-color);
    font-weight: 500;
    transition: all .2s ease;
}

.page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: #fff;
    box-shadow: 0 2px 8px rgba(245, 158, 11, .3);
}

.page-link:hover {
    background-color: var(--bg-light);
    border-color: var(--primary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
}

/* RESPONSIVE */
@media (max-width: 991px) {
    .sidebar {
        position: static;
        margin-top: 40px;
    }
    
    .page-title h1 {
        font-size: 32px;
    }
}

@media (max-width: 767px) {
    .blog-card-body {
        padding: 20px;
    }
    
    .post-img {
        height: 200px;
    }
}

/* ANIMATION */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.blog-card {
    animation: fadeInUp .5s ease-out;
}
</style>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Berita</li>
                </ol>
            </nav>
            <h1>Berita Terkini</h1>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
        <div class="row">

            <!-- BLOG CONTENT -->
            <div class="col-lg-8">
                <section id="blog-posts" class="blog-posts section">

                    <div class="row gy-4">

                        @foreach ($item as $berita)
                        <div class="col-lg-6">
                            <article class="blog-card">

                                <!-- IMAGE -->
                                <a href="{{ route('berita.detail', $berita->id_berita) }}"
                                   class="post-img">
                                    <img src="{{ asset('storage/'.$berita->image) }}"
                                         alt="{{ $berita->judul }}">
                                </a>

                                <!-- CARD BODY -->
                                <div class="blog-card-body">
                                    <!-- META -->
                                    <div class="meta-top">
                                        <ul>
                                            <li>
                                                <i class="bi bi-person-circle"></i> {{ $berita->nmpenulis }}
                                            </li>
                                            <li>
                                                <i class="bi bi-calendar-event"></i>
                                                {{ \Carbon\Carbon::parse($berita->tgl_berita)->format('d M Y') }}
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- TITLE -->
                                    <h2 class="title">
                                        <a href="{{ route('berita.detail', $berita->id_berita) }}">
                                            {{ $berita->judul }}
                                        </a>
                                    </h2>

                                    <!-- CONTENT -->
                                    <div class="content">
                                        <p>
                                            {{ Str::limit(strip_tags($berita->narasiberita), 150) }}
                                        </p>

                                        <div class="read-more">
                                            <a href="{{ route('berita.detail', $berita->id_berita) }}">
                                                Baca Selengkapnya
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </article>
                        </div>
                        @endforeach

                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center">
                        {{ $item->links('pagination::bootstrap-5') }}
                    </div>

                </section>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 sidebar">
                <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                    <!-- SEARCH -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Pencarian</h3>
                        <form action="{{ route('berita') }}" method="GET">
                            <input type="text" name="q"
                                   placeholder="Cari berita..."
                                   value="{{ request('q') }}">
                            <button type="submit" title="Search">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- RECENT POSTS -->
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">Berita Terbaru</h3>

                        @foreach($recentPosts as $post)
                        <a href="{{ route('berita.detail', $post->id_berita) }}"
                           class="recent-post-item">

                            <img src="{{ asset('storage/'.$post->image) }}"
                                 alt="{{ $post->judul }}">

                            <div>
                                <h4>{{ Str::limit($post->judul, 50) }}</h4>
                                <time>
                                    {{ \Carbon\Carbon::parse($post->tgl_berita)->format('d M Y') }}
                                </time>
                            </div>

                        </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>

</main>
@endsection