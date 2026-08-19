@extends('layouts.app')

@section('title', $review->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('reviews.index') }}" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors">
            ← 목록으로 돌아가기
        </a>
    </div>

    <article class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
        @if($review->image)
            <div class="aspect-video bg-[#e3e3e0] dark:bg-[#3E3E3A] overflow-hidden">
                <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="p-8">
            <div class="flex items-center gap-2 mb-4">
                @for($i = 0; $i < $review->rating; $i++)
                    <span class="text-yellow-400 text-xl">⭐</span>
                @endfor
            </div>

            <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ $review->title }}</h1>

            <div class="flex items-center gap-4 text-sm text-[#706f6c] dark:text-[#A1A09A] mb-6">
                <span>작성자: {{ $review->adopter_name }}</span>
                <span>작성일: {{ $review->created_at->format('Y년 m월 d일') }}</span>
            </div>

            @if($review->animal)
                <div class="mb-6 p-4 bg-[#e3e3e0] dark:bg-[#3E3E3A] rounded-lg">
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-1">입양한 동물</p>
                    <a href="{{ route('animals.show', $review->animal) }}" class="text-lg font-semibold text-[#f53003] dark:text-[#FF4433] hover:underline">
                        {{ $review->animal->name }} ({{ $review->animal->species }})
                    </a>
                </div>
            @endif

            <div class="prose dark:prose-invert max-w-none">
                <div class="text-[#1b1b18] dark:text-[#EDEDEC] leading-relaxed whitespace-pre-line">
                    {{ $review->content }}
                </div>
            </div>
        </div>
    </article>
</div>
@endsection

