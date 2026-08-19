@extends('layouts.app')

@section('title', '입양 후기')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">입양 후기</h1>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">입양하신 분들의 생생한 후기를 확인하세요</p>
        </div>
        <a href="{{ route('reviews.create') }}" class="px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm text-sm font-medium hover:bg-[#f53003] dark:hover:bg-white transition-colors">
            후기 작성하기
        </a>
    </div>
</div>

@if($reviews->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($reviews as $review)
            <a href="{{ route('reviews.show', $review) }}" class="group">
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden hover:shadow-lg transition-shadow">
                    @if($review->image)
                        <div class="aspect-video bg-[#e3e3e0] dark:bg-[#3E3E3A] overflow-hidden">
                            <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            @for($i = 0; $i < $review->rating; $i++)
                                <span class="text-yellow-400">⭐</span>
                            @endfor
                        </div>
                        <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2 group-hover:text-[#f53003] dark:group-hover:text-[#FF4433] transition-colors">
                            {{ $review->title }}
                        </h3>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] line-clamp-3 mb-4">{{ $review->content }}</p>
                        <div class="flex items-center justify-between text-xs text-[#706f6c] dark:text-[#A1A09A]">
                            <span>{{ $review->adopter_name }}</span>
                            <span>{{ $review->created_at->format('Y.m.d') }}</span>
                        </div>
                        @if($review->animal)
                            <div class="mt-3 pt-3 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">입양한 동물: <span class="font-medium">{{ $review->animal->name }}</span></p>
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $reviews->links() }}
    </div>
@else
    <div class="text-center py-16 bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="text-6xl mb-4">💬</div>
        <h3 class="text-xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">등록된 후기가 없습니다</h3>
        <p class="text-[#706f6c] dark:text-[#A1A09A] mb-6">첫 번째 후기를 작성해보세요!</p>
        <a href="{{ route('reviews.create') }}" class="inline-block px-6 py-3 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm font-medium hover:bg-[#f53003] dark:hover:bg-white transition-colors">
            후기 작성하기
        </a>
    </div>
@endif
@endsection

