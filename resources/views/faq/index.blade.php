@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-16">
        <div class="inline-block mb-6">
            <div class="text-7xl animate-bounce">❓</div>
        </div>
        <h1 class="text-5xl md:text-6xl font-black text-white mb-6 drop-shadow-2xl">자주 묻는 질문</h1>
        <p class="text-2xl text-white/95 font-bold">궁금한 점을 확인하세요</p>
    </div>

    <div class="space-y-6">
        @php
            $faqs = [
                ['q' => '입양 비용이 있나요?', 'a' => '입양 자체는 무료입니다. 다만 동물의 건강 검진, 예방접종, 중성화 수술 등에 소요되는 비용이 있을 수 있습니다.'],
                ['q' => '입양 조건은 무엇인가요?', 'a' => '성인이며, 안정적인 주거 환경과 경제적 여유가 있어야 합니다. 또한 가족 구성원 모두의 동의가 필요합니다.'],
                ['q' => '입양 후 반려가 가능한가요?', 'a' => '입양은 평생 책임입니다. 특별한 사정이 있는 경우에만 센터와 상의하여 반려 절차를 진행할 수 있습니다.'],
                ['q' => '입양 전 준비물은 무엇인가요?', 'a' => '사료, 물그릇, 장난감, 침대, 목줄 등 기본적인 용품들을 미리 준비하시면 좋습니다.'],
            ];
        @endphp

        @foreach($faqs as $index => $faq)
        <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 transform">
            <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 flex items-center gap-4">
                <span class="text-4xl">❓</span>
                {{ $faq['q'] }}
            </h3>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed pl-14 font-semibold text-lg">{{ $faq['a'] }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
