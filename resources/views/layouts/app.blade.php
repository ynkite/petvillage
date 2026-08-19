<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '유기동물 입양 사이트') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap (from public shapely assets or fallback CDN) -->
    <link rel="stylesheet" href="/shapely/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/shapely/assets/css/font-awesome.min.css">

    <!-- App styles / scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Noto Sans KR', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f7f8fb;
            color: #1b1b18;
        }
        .navbar-brand {
            font-weight: 800;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <span class="fs-4">🐾</span>
                <span>유기동물 입양센터</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">홈</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('animals.*') ? 'active fw-bold' : '' }}" href="{{ route('animals.index') }}">입양하기</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('guide.*') ? 'active fw-bold' : '' }}" href="{{ route('guide.index') }}">입양안내</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('reviews.*') ? 'active fw-bold' : '' }}" href="{{ route('reviews.index') }}">입양후기</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('centers.*') ? 'active fw-bold' : '' }}" href="{{ route('centers.index') }}">센터안내</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('faq.*') ? 'active fw-bold' : '' }}" href="{{ route('faq.index') }}">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('notices.*') ? 'active fw-bold' : '' }}" href="{{ route('notices.index') }}">공지사항</a></li>
                    <li class="nav-item">
                        <a class="btn btn-primary px-3 ms-lg-2" href="{{ route('donate.index') }}">후원하기 ✨</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container py-4">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 10.97 12.03 5.91l-1.06-1.06L6.97 8.84 5.03 6.9 3.97 7.97l3 3z"/>
                    </svg>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center gap-2" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.964 0L.165 13.233c-.457.778.091 1.767.982 1.767h13.706c.89 0 1.438-.99.982-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1-2.002 0 1 1 0 0 1 2.002 0z"/>
                    </svg>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} 유기동물 입양 사이트. 모든 권리 보유.
        </div>
    </footer>

    <!-- AI 챗봇 -->
    @include('components.chatbot')

    <script src="/shapely/assets/js/bootstrap.min.js"></script>
    <script src="/shapely/assets/js/shapely-scripts.js"></script>
</body>
</html>
