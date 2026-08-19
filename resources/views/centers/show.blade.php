@extends('layouts.app')

@section('title', $center->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('centers.index') }}" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors">
            ← 목록으로 돌아가기
        </a>
    </div>

    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
        @if($center->image)
            <div class="aspect-video bg-[#e3e3e0] dark:bg-[#3E3E3A] overflow-hidden">
                <img src="{{ asset('storage/' . $center->image) }}" alt="{{ $center->name }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="p-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $center->name }}</h1>
                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 font-semibold rounded">
                    {{ $center->region }}
                </span>
            </div>

            <div class="space-y-6">
                <div>
                    <h3 class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">주소</h3>
                    <p class="text-lg text-[#1b1b18] dark:text-[#EDEDEC]">{{ $center->address }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($center->phone_intake)
                        <div>
                            <h3 class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">입소 전화</h3>
                            <a href="tel:{{ $center->phone_intake }}" class="text-lg text-[#f53003] dark:text-[#FF4433] hover:underline">
                                {{ $center->phone_intake }}
                            </a>
                        </div>
                    @endif

                    @if($center->phone_adoption)
                        <div>
                            <h3 class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">입양 전화</h3>
                            <a href="tel:{{ $center->phone_adoption }}" class="text-lg text-[#f53003] dark:text-[#FF4433] hover:underline">
                                {{ $center->phone_adoption }}
                            </a>
                        </div>
                    @endif
                </div>

                @if($center->description)
                    <div>
                        <h3 class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">센터 소개</h3>
                        <p class="text-[#1b1b18] dark:text-[#EDEDEC] leading-relaxed whitespace-pre-line">{{ $center->description }}</p>
                    </div>
                @endif

                @if($center->latitude && $center->longitude)
                    <div>
                        <h3 class="text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">지도</h3>
                        <div class="aspect-video bg-[#e3e3e0] dark:bg-[#3E3E3A] rounded-lg overflow-hidden">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.123456789!2d{{ $center->longitude }}!3d{{ $center->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z{{ $center->latitude }}%2C{{ $center->longitude }}!5e0!3m2!1sko!2skr!4v1234567890123!5m2!1sko!2skr"
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy"
                            ></iframe>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

