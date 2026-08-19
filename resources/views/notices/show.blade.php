@extends('layouts.app')

@section('title', $notice->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('notices.index') }}" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors">
            ← 목록으로 돌아가기
        </a>
    </div>

    <article class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-8">
        <div class="mb-6">
            @if($notice->is_important)
                <span class="inline-block px-3 py-1 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 text-sm font-semibold rounded mb-4">중요</span>
            @endif
            <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ $notice->title }}</h1>
            <div class="flex items-center gap-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                <span>작성일: {{ $notice->created_at->format('Y년 m월 d일') }}</span>
                <span>조회수: {{ $notice->views }}</span>
            </div>
        </div>

        <div class="prose dark:prose-invert max-w-none">
            <div class="text-[#1b1b18] dark:text-[#EDEDEC] leading-relaxed whitespace-pre-line">
                {{ $notice->content }}
            </div>
        </div>
    </article>
</div>
@endsection

