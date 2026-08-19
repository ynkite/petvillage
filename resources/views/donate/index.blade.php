@extends('layouts.app')

@section('title', '후원하기')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-16">
        <div class="inline-block mb-6">
            <div class="text-7xl animate-bounce">✨</div>
        </div>
        <h1 class="text-5xl md:text-6xl font-black text-white mb-6 drop-shadow-2xl">후원하기</h1>
        <p class="text-2xl text-white/95 font-bold">작은 관심이 큰 변화를 만듭니다</p>
    </div>

    <div class="bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 rounded-3xl p-12 text-white text-center mb-12 shadow-3xl relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
        <div class="relative">
            <h2 class="text-4xl md:text-5xl font-black mb-6 drop-shadow-2xl">유기동물을 위한 후원</h2>
            <p class="text-xl mb-10 text-white/95 max-w-3xl mx-auto leading-relaxed font-bold drop-shadow-lg">
                여러분의 후원은 유기동물들의 새로운 삶을 만드는 데 큰 도움이 됩니다.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white/20 backdrop-blur-md rounded-3xl p-8 border-3 border-white/30 shadow-2xl">
                    <div class="text-6xl mb-4">💰</div>
                    <h3 class="font-black text-2xl mb-3">후원금</h3>
                    <p class="text-sm text-white/90 font-semibold">동물들의 치료와 관리에 사용됩니다</p>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-3xl p-8 border-3 border-white/30 shadow-2xl">
                    <div class="text-6xl mb-4">🍽️</div>
                    <h3 class="font-black text-2xl mb-3">사료 후원</h3>
                    <p class="text-sm text-white/90 font-semibold">건강한 사료로 동물들을 돌봅니다</p>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-3xl p-8 border-3 border-white/30 shadow-2xl">
                    <div class="text-6xl mb-4">❤️</div>
                    <h3 class="font-black text-2xl mb-3">자원봉사</h3>
                    <p class="text-sm text-white/90 font-semibold">직접 참여하여 도움을 주세요</p>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-effect rounded-3xl shadow-2xl border-2 border-white/30 p-10">
        <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-8">후원 방법</h2>
        <div class="space-y-6">
            <div class="flex gap-6 p-6 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-2xl border-2 border-purple-200 dark:border-purple-800">
                <span class="text-5xl">🏦</span>
                <div>
                    <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2">계좌 이체</h3>
                    <p class="text-gray-700 dark:text-gray-300 font-bold text-lg">국민은행 123-456-789012</p>
                    <p class="text-gray-600 dark:text-gray-400 font-semibold">(예금주: 유기동물입양센터)</p>
                </div>
            </div>
            <div class="flex gap-6 p-6 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-2xl border-2 border-blue-200 dark:border-blue-800">
                <span class="text-5xl">📞</span>
                <div>
                    <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2">전화 문의</h3>
                    <p class="text-gray-700 dark:text-gray-300 font-bold text-lg">1588-0000</p>
                    <p class="text-gray-600 dark:text-gray-400 font-semibold">(평일 09:00 - 18:00)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
