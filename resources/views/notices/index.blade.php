@extends('layouts.app')

@section('title', '공지사항')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">공지사항</h1>
    <p class="text-[#706f6c] dark:text-[#A1A09A]">중요한 공지사항을 확인하세요</p>
</div>

<div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
    @if($notices->count() > 0)
        @foreach($notices as $notice)
            <a href="{{ route('notices.show', $notice) }}" class="block p-6 border-b border-[#e3e3e0] dark:border-[#3E3E3A] last:border-b-0 hover:bg-[#e3e3e0] dark:hover:bg-[#3E3E3A] transition-colors">
                <div class="flex items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            @if($notice->is_important)
                                <span class="px-2 py-1 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 text-xs font-semibold rounded">중요</span>
                            @endif
                            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $notice->title }}</h3>
                        </div>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] line-clamp-2">{{ Str::limit(strip_tags($notice->content), 150) }}</p>
                    </div>
                    <div class="text-right text-sm text-[#706f6c] dark:text-[#A1A09A] whitespace-nowrap">
                        <div>{{ $notice->created_at->format('Y.m.d') }}</div>
                        <div class="text-xs mt-1">조회 {{ $notice->views }}</div>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="p-4">
            {{ $notices->links() }}
        </div>
    @else
        <div class="p-12 text-center">
            <div class="text-6xl mb-4">📢</div>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">등록된 공지사항이 없습니다.</p>
        </div>
    @endif
</div>
@endsection

