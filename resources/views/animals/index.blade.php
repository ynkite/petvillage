@extends('layouts.app')

@section('title', '유기동물 목록')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold">입양 가능한 동물들</h1>
    <p class="text-muted">새로운 가족을 찾고 있는 동물들을 만나보세요</p>
</div>

<!-- 검색 및 필터 -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('animals.index') }}" class="row g-3 align-items-end">
            <div class="col-12 col-md-4">
                <label class="form-label">검색</label>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="이름 또는 설명으로 검색..." 
                    class="form-control"
                >
            </div>
            <div class="col-6 col-md-3">
                <label class="form-label">종류</label>
                <select name="species" class="form-select">
                    <option value="">모든 종류</option>
                    <option value="개" {{ request('species') == '개' ? 'selected' : '' }}>개</option>
                    <option value="고양이" {{ request('species') == '고양이' ? 'selected' : '' }}>고양이</option>
                    <option value="기타" {{ request('species') == '기타' ? 'selected' : '' }}>기타</option>
                </select>
            </div>
            <div class="col-6 col-md-3">
                <label class="form-label">상태</label>
                <select name="status" class="form-select">
                    <option value="">모든 상태</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>입양 가능</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>입양 대기</option>
                    <option value="adopted" {{ request('status') == 'adopted' ? 'selected' : '' }}>입양 완료</option>
                </select>
            </div>
            <div class="col-12 col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">검색</button>
                @if(request()->hasAny(['search', 'species', 'status']))
                    <a href="{{ route('animals.index') }}" class="btn btn-outline-secondary">초기화</a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- 동물 카드 그리드 -->
@if($animals->count() > 0)
    <div class="row g-3">
        @foreach($animals as $animal)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="ratio ratio-1x1 bg-light">
                        @if($animal->image)
                            <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="object-fit-cover w-100 h-100">
                        @else
                            <div class="d-flex align-items-center justify-content-center fs-1">🐾</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $animal->name }}</h5>
                            <span class="badge
                                @if($animal->status == 'available') bg-success
                                @elseif($animal->status == 'pending') bg-warning text-dark
                                @else bg-secondary
                                @endif">
                                @if($animal->status == 'available') 입양 가능
                                @elseif($animal->status == 'pending') 입양 대기
                                @else 입양 완료
                                @endif
                            </span>
                        </div>
                        <ul class="list-unstyled small text-muted mb-3">
                            <li><strong>종류:</strong> {{ $animal->species }}</li>
                            @if($animal->breed)
                                <li><strong>품종:</strong> {{ $animal->breed }}</li>
                            @endif
                            @if($animal->age)
                                <li><strong>나이:</strong> {{ $animal->age }}세</li>
                            @endif
                            <li><strong>성별:</strong> {{ $animal->gender }}</li>
                            @if($animal->location)
                                <li><strong>위치:</strong> {{ $animal->location }}</li>
                            @endif
                        </ul>
                        <a href="{{ route('animals.show', $animal) }}" class="btn btn-outline-primary w-100">상세보기</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- 페이지네이션 -->
    <div class="mt-4">
        {{ $animals->links() }}
    </div>
@else
    <div class="text-center py-5">
        <div class="fs-1 mb-3">🐾</div>
        <h5 class="fw-bold mb-2">등록된 동물이 없습니다</h5>
        <p class="text-muted mb-3">첫 번째 동물을 등록해보세요!</p>
        <a href="{{ route('animals.create') }}" class="btn btn-primary">동물 등록하기</a>
    </div>
@endif
@endsection

