@extends('layouts.app')

@section('title', '입양 안내')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-16">
        <div class="inline-block mb-6">
            <div class="text-7xl animate-bounce">📋</div>
        </div>
        <h1 class="text-5xl md:text-6xl font-black text-white mb-6 drop-shadow-2xl">입양 안내</h1>
        <p class="text-2xl text-white/95 font-bold">입양 절차와 주의사항을 확인하세요</p>
    </div>

    <div class="space-y-8">
        <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 p-10">
            <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-8 flex items-center gap-4">
                <span class="text-5xl">📋</span>
                입양 절차
            </h2>
            <ol class="space-y-6">
                <li class="flex gap-6 items-start">
                    <span class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-xl border-3 border-white">1</span>
                    <div class="flex-1">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2">동물 선택</h3>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold leading-relaxed">입양하고 싶은 동물을 선택하고 상세 정보를 확인하세요.</p>
                    </div>
                </li>
                <li class="flex gap-6 items-start">
                    <span class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-xl border-3 border-white">2</span>
                    <div class="flex-1">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2">상담 신청</h3>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold leading-relaxed">해당 센터에 연락하여 입양 상담을 신청하세요.</p>
                    </div>
                </li>
                <li class="flex gap-6 items-start">
                    <span class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-xl border-3 border-white">3</span>
                    <div class="flex-1">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2">면접 및 확인</h3>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold leading-relaxed">센터에서 입양 조건을 확인하고 면접을 진행합니다.</p>
                    </div>
                </li>
                <li class="flex gap-6 items-start">
                    <span class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-xl border-3 border-white">4</span>
                    <div class="flex-1">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2">입양 완료</h3>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold leading-relaxed">모든 절차가 완료되면 새로운 가족을 맞이할 수 있습니다.</p>
                    </div>
                </li>
            </ol>
        </div>

        <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 p-10">
            <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-8 flex items-center gap-4">
                <span class="text-5xl">⚠️</span>
                주의사항
            </h2>
            <ul class="space-y-5">
                <li class="flex gap-4 items-start">
                    <span class="text-3xl text-red-500 font-black">•</span>
                    <p class="text-gray-700 dark:text-gray-300 font-semibold text-lg leading-relaxed flex-1">입양은 평생 책임을 의미합니다. 신중하게 결정해주세요.</p>
                </li>
                <li class="flex gap-4 items-start">
                    <span class="text-3xl text-red-500 font-black">•</span>
                    <p class="text-gray-700 dark:text-gray-300 font-semibold text-lg leading-relaxed flex-1">가족 구성원 모두의 동의가 필요합니다.</p>
                </li>
                <li class="flex gap-4 items-start">
                    <span class="text-3xl text-red-500 font-black">•</span>
                    <p class="text-gray-700 dark:text-gray-300 font-semibold text-lg leading-relaxed flex-1">입양 후에도 정기적인 관리와 돌봄이 필요합니다.</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
