@extends('layouts.app')

@section('title', '센터 안내')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">센터 안내</h1>
    <p class="text-[#706f6c] dark:text-[#A1A09A]">전국 센터 위치 및 연락처를 확인하세요</p>
</div>

@if($centers->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($centers as $center)
            <a href="{{ route('centers.show', $center) }}" class="group">
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden hover:shadow-lg transition-shadow">
                    @if($center->image)
                        <div class="aspect-video bg-[#e3e3e0] dark:bg-[#3E3E3A] overflow-hidden">
                            <img src="{{ asset('storage/' . $center->image) }}" alt="{{ $center->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="aspect-video bg-gradient-to-br from-[#f53003] to-[#ff6b4a] dark:from-[#FF4433] dark:to-[#ff6b4a] flex items-center justify-center">
                            <span class="text-6xl">📍</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] group-hover:text-[#f53003] dark:group-hover:text-[#FF4433] transition-colors">
                                {{ $center->name }}
                            </h3>
                            <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 text-xs font-semibold rounded">
                                {{ $center->region }}
                            </span>
                        </div>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-2">{{ $center->address }}</p>
                        <div class="space-y-2 text-sm">
                            @if($center->phone_intake)
                                <div class="flex items-center gap-2 text-[#706f6c] dark:text-[#A1A09A]">
                                    <span>📞 입소:</span>
                                    <a href="tel:{{ $center->phone_intake }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">
                                        {{ $center->phone_intake }}
                                    </a>
                                </div>
                            @endif
                            @if($center->phone_adoption)
                                <div class="flex items-center gap-2 text-[#706f6c] dark:text-[#A1A09A]">
                                    <span>📞 입양:</span>
                                    <a href="tel:{{ $center->phone_adoption }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">
                                        {{ $center->phone_adoption }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@else
    <div class="text-center py-16 bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="text-6xl mb-4">📍</div>
        <p class="text-[#706f6c] dark:text-[#A1A09A]">등록된 센터가 없습니다.</p>
    </div>
@endif
@endsection

