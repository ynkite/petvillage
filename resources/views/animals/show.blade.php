@extends('layouts.app')

@section('title', $animal->name . ' - 상세 정보')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('animals.index') }}" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors">
            ← 목록으로 돌아가기
        </a>
    </div>

    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
        <div class="grid md:grid-cols-2 gap-0">
            <!-- 이미지 -->
            <div class="aspect-square bg-[#e3e3e0] dark:bg-[#3E3E3A] overflow-hidden">
                @if($animal->image)
                    <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-9xl">
                        🐾
                    </div>
                @endif
            </div>

            <!-- 정보 -->
            <div class="p-8">
                <div class="flex items-start justify-between mb-4">
                    <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $animal->name }}</h1>
                    <span class="px-3 py-1 text-sm rounded-sm 
                        @if($animal->status == 'available') bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300
                        @elseif($animal->status == 'pending') bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-300
                        @else bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300
                        @endif">
                        @if($animal->status == 'available') 입양 가능
                        @elseif($animal->status == 'pending') 입양 대기
                        @else 입양 완료
                        @endif
                    </span>
                </div>

                <div class="space-y-4 mb-6">
                    <div>
                        <span class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">종류</span>
                        <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $animal->species }}</p>
                    </div>
                    
                    @if($animal->breed)
                    <div>
                        <span class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">품종</span>
                        <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $animal->breed }}</p>
                    </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        @if($animal->age)
                        <div>
                            <span class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">나이</span>
                            <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $animal->age }}세</p>
                        </div>
                        @endif

                        <div>
                            <span class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">성별</span>
                            <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $animal->gender }}</p>
                        </div>
                    </div>

                    @if($animal->location)
                    <div>
                        <span class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">위치</span>
                        <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $animal->location }}</p>
                    </div>
                    @endif
                </div>

                @if($animal->description)
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">소개</h3>
                    <p class="text-[#1b1b18] dark:text-[#EDEDEC] leading-relaxed whitespace-pre-line">{{ $animal->description }}</p>
                </div>
                @endif

                <div class="flex gap-4">
                    <a href="{{ route('animals.edit', $animal) }}" class="flex-1 px-6 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm text-center text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#e3e3e0] dark:hover:bg-[#3E3E3A] transition-colors">
                        수정
                    </a>
                    <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="flex-1" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white rounded-sm hover:bg-red-700 transition-colors">
                            삭제
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

