@extends('layouts.app')

@section('title', '설정 필요')

@section('content')
<div class="max-w-2xl mx-auto text-center py-16">
    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-8">
        <div class="text-6xl mb-4">⚠️</div>
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">데이터베이스 설정이 필요합니다</h1>
        <p class="text-[#706f6c] dark:text-[#A1A09A] mb-6">
            사이트를 사용하려면 먼저 데이터베이스 마이그레이션을 실행해야 합니다.
        </p>
        
        @if(isset($error))
            <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 rounded text-left">
                <strong>에러:</strong> {{ $error }}
            </div>
        @endif

        <div class="bg-[#e3e3e0] dark:bg-[#3E3E3A] rounded p-4 text-left mb-6">
            <h3 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">다음 명령어를 실행하세요:</h3>
            <code class="block text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                php artisan migrate
            </code>
        </div>

        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
            마이그레이션 실행 후 페이지를 새로고침하세요.
        </p>
    </div>
</div>
@endsection

