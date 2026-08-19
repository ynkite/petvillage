@extends('layouts.app')

@section('title', '동물 등록')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">동물 등록</h1>
        <p class="text-[#706f6c] dark:text-[#A1A09A]">새로운 유기동물 정보를 등록해주세요</p>
    </div>

    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-8">
        <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6">
                <!-- 이름 -->
                <div>
                    <label for="name" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        이름 <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        required
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 종류 -->
                <div>
                    <label for="species" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        종류 <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="species" 
                        name="species" 
                        required
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >
                        <option value="">선택하세요</option>
                        <option value="개" {{ old('species') == '개' ? 'selected' : '' }}>개</option>
                        <option value="고양이" {{ old('species') == '고양이' ? 'selected' : '' }}>고양이</option>
                        <option value="기타" {{ old('species') == '기타' ? 'selected' : '' }}>기타</option>
                    </select>
                    @error('species')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 품종 -->
                <div>
                    <label for="breed" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        품종
                    </label>
                    <input 
                        type="text" 
                        id="breed" 
                        name="breed" 
                        value="{{ old('breed') }}"
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >
                    @error('breed')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 나이, 성별 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="age" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            나이
                        </label>
                        <input 
                            type="number" 
                            id="age" 
                            name="age" 
                            value="{{ old('age') }}"
                            min="0"
                            class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                        >
                        @error('age')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            성별 <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="gender" 
                            name="gender" 
                            required
                            class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                        >
                            <option value="">선택하세요</option>
                            <option value="수컷" {{ old('gender') == '수컷' ? 'selected' : '' }}>수컷</option>
                            <option value="암컷" {{ old('gender') == '암컷' ? 'selected' : '' }}>암컷</option>
                        </select>
                        @error('gender')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 위치 -->
                <div>
                    <label for="location" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        위치
                    </label>
                    <input 
                        type="text" 
                        id="location" 
                        name="location" 
                        value="{{ old('location') }}"
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >
                    @error('location')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 상태 -->
                <div>
                    <label for="status" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        상태 <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="status" 
                        name="status" 
                        required
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >
                        <option value="available" {{ old('status', 'available') == 'available' ? 'selected' : '' }}>입양 가능</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>입양 대기</option>
                        <option value="adopted" {{ old('status') == 'adopted' ? 'selected' : '' }}>입양 완료</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 설명 -->
                <div>
                    <label for="description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        설명
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="5"
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 이미지 -->
                <div>
                    <label for="image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        이미지
                    </label>
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        accept="image/*"
                        class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    >
                    @error('image')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm font-medium hover:bg-[#f53003] dark:hover:bg-white transition-colors">
                    등록하기
                </button>
                <a href="{{ route('animals.index') }}" class="flex-1 px-6 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm text-center text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#e3e3e0] dark:hover:bg-[#3E3E3A] transition-colors">
                    취소
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

