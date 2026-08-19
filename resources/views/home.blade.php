@extends('layouts.app')

@section('title', '홈')

@section('content')
<!-- 히어로 섹션 (Bootstrap) -->
<div class="position-relative overflow-hidden rounded-4 shadow-sm mb-5" style="min-height: 420px;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(120deg, rgba(0,0,0,0.45), rgba(0,0,0,0.25)), url('/shapely/assets/images/placeholder_wide.jpg') center/cover no-repeat;"></div>
    <div class="position-relative container py-5 text-white">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">We Change Everything</h1>
                <p class="lead mb-4">유기동물 입양, 센터 정보, 인증 후기까지 한 곳에서. 따뜻한 가족을 위한 시작을 함께합니다.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('animals.index') }}" class="btn btn-primary btn-lg px-4">입양 보러가기</a>
                    <a href="{{ route('guide.index') }}" class="btn btn-outline-light btn-lg px-4">입양 안내</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 빠른 링크 카드 -->
<div class="row g-3 mb-5">
    <div class="col-6 col-md-3">
        <a href="{{ route('animals.index') }}" class="text-decoration-none">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">
                    <div class="fs-1 mb-2">🐾</div>
                    <h5 class="fw-bold">입양하기</h5>
                    <p class="text-muted small mb-0">입양 가능한 친구들</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="{{ route('guide.index') }}" class="text-decoration-none">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">
                    <div class="fs-1 mb-2">📋</div>
                    <h5 class="fw-bold">입양 안내</h5>
                    <p class="text-muted small mb-0">절차 · 준비물</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="{{ route('reviews.index') }}" class="text-decoration-none">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">
                    <div class="fs-1 mb-2">💬</div>
                    <h5 class="fw-bold">입양 후기</h5>
                    <p class="text-muted small mb-0">행복한 이야기</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="{{ route('centers.index') }}" class="text-decoration-none">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">
                    <div class="fs-1 mb-2">📍</div>
                    <h5 class="fw-bold">센터 안내</h5>
                    <p class="text-muted small mb-0">전국 보호소 정보</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- 최근 입양 가능한 동물 -->
@if(isset($recentAnimals) && $recentAnimals->count() > 0)
<div class="mb-16">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-3 drop-shadow-lg">최근 입양 가능한 동물</h2>
            <p class="text-lg text-white/90 font-bold">새롭게 등록된 친구들을 만나보세요</p>
        </div>
        <a href="{{ route('animals.index') }}" class="px-6 py-3 bg-white/20 backdrop-blur-md border-2 border-white/50 text-white rounded-xl hover:bg-white/30 transition-all duration-300 font-black flex items-center gap-2 shadow-xl">
            더보기
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($recentAnimals as $animal)
            <a href="{{ route('animals.show', $animal) }}" class="group">
                <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 overflow-hidden hover:shadow-3xl transition-all duration-300 hover:-translate-y-3 hover:scale-105 transform">
                    <div class="aspect-square bg-gradient-to-br from-purple-400 via-pink-400 to-red-400 overflow-hidden relative">
                        @if($animal->image)
                            <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-9xl">
                                🐾
                            </div>
                        @endif
                        <div class="absolute top-4 right-4 px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full text-xs font-black text-white shadow-xl">
                            입양 가능 ✨
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-pink-400 transition-colors mb-2">
                            {{ $animal->name }}
                        </h3>
                        <p class="text-sm text-gray-700 dark:text-gray-300 font-bold">{{ $animal->species }} · {{ $animal->breed ?? '품종 미상' }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

<!-- 최근 입양 후기 -->
@if(isset($recentReviews) && $recentReviews->count() > 0)
<div class="mb-16">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-3 drop-shadow-lg">최근 입양 후기</h2>
            <p class="text-lg text-white/90 font-bold">행복한 입양 이야기를 확인해보세요</p>
        </div>
        <a href="{{ route('reviews.index') }}" class="px-6 py-3 bg-white/20 backdrop-blur-md border-2 border-white/50 text-white rounded-xl hover:bg-white/30 transition-all duration-300 font-black flex items-center gap-2 shadow-xl">
            더보기
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($recentReviews as $review)
            <a href="{{ route('reviews.show', $review) }}" class="group">
                <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-3 hover:scale-105 transform">
                    <div class="flex items-center gap-2 mb-5">
                        @for($i = 0; $i < $review->rating; $i++)
                            <span class="text-2xl">⭐</span>
                        @endfor
                    </div>
                    <h3 class="font-black text-xl text-gray-900 dark:text-white mb-4 group-hover:text-purple-600 dark:group-hover:text-pink-400 transition-colors">
                        {{ $review->title }}
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2 mb-6 font-semibold leading-relaxed">{{ Str::limit($review->content, 100) }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-600 dark:text-gray-400 pt-5 border-t-2 border-white/20 font-bold">
                        <span>{{ $review->adopter_name }}</span>
                        <span>{{ $review->created_at->format('Y.m.d') }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

<!-- 공지사항 -->
@if(isset($notices) && $notices->count() > 0)
<div class="mb-16">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-3 drop-shadow-lg">공지사항</h2>
            <p class="text-lg text-white/90 font-bold">중요한 소식을 확인하세요</p>
        </div>
        <a href="{{ route('notices.index') }}" class="px-6 py-3 bg-white/20 backdrop-blur-md border-2 border-white/50 text-white rounded-xl hover:bg-white/30 transition-all duration-300 font-black flex items-center gap-2 shadow-xl">
            더보기
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
    <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 overflow-hidden">
        @foreach($notices as $notice)
            <a href="{{ route('notices.show', $notice) }}" class="block p-6 border-b-2 border-white/20 last:border-b-0 hover:bg-gradient-to-r hover:from-purple-500/10 hover:to-pink-500/10 transition-all duration-200">
                <div class="flex items-center gap-4">
                    @if($notice->is_important)
                        <span class="px-4 py-2 bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-white text-xs font-black rounded-full whitespace-nowrap shadow-lg">중요 ⚠️</span>
                    @endif
                    <h3 class="flex-1 font-black text-lg text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-pink-400 transition-colors">{{ $notice->title }}</h3>
                    <span class="text-sm text-gray-700 dark:text-gray-300 whitespace-nowrap font-bold">{{ $notice->created_at->format('Y.m.d') }}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

<!-- CTA 섹션 -->
<div class="bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 rounded-3xl p-16 text-center text-white shadow-3xl relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative">
        <h2 class="text-5xl md:text-6xl font-black mb-6 drop-shadow-2xl">함께 만들어가는 행복한 가족</h2>
        <p class="text-2xl mb-10 text-white/95 max-w-3xl mx-auto leading-relaxed font-bold drop-shadow-lg">
            작은 관심이 큰 변화를 만듭니다. 유기동물 입양으로 새로운 가족을 만나보세요.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('animals.index') }}" class="px-10 py-5 bg-white text-orange-600 rounded-2xl font-black text-xl hover:bg-gray-50 transition-all duration-300 shadow-2xl hover:shadow-3xl hover:scale-110 transform">
                입양하기 🚀
            </a>
            <a href="{{ route('donate.index') }}" class="px-10 py-5 bg-white/20 backdrop-blur-md border-4 border-white/50 text-white rounded-2xl font-black text-xl hover:bg-white/30 transition-all duration-300 shadow-2xl">
                후원하기 ✨
            </a>
        </div>
    </div>
</div>
@endsection
