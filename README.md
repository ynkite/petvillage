# PetVillage

반려동물 입양 정보를 등록하고 조회하는 웹 서비스입니다.
보호소 공고를 모아 보여 주고, 후기와 안내를 함께 제공합니다.

- 기간 2025.12
- 개인 프로젝트
- 2025 Laravel 웹 솔루션 경진대회 **금상** · 인덕대학교

## 스택

PHP · Laravel · MariaDB · Blade · Tailwind

## 기능

| 도메인 | 내용 |
|---|---|
| 입양 동물 | 공고 등록 · 수정 · 목록 · 상세 |
| 보호소 | 기관 목록 · 상세 |
| 후기 | 작성 · 목록 · 상세 |
| 공지 | 목록 · 상세 |
| 안내 · FAQ | 입양 절차 안내, 자주 묻는 질문 |
| 후원 | 후원 안내 |
| 챗봇 | 대화로 입양 정보를 안내 |

## 구조

```
app/Models/           Animal · Center · Notice · Review
app/Http/Controllers/ Animal · Center · Notice · Review · Guide · Faq · Donate · Chatbot · Home
resources/views/      화면 19종 (Blade)
database/migrations/  animals · centers · notices · reviews
```

## 실행

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

DB 접속 정보와 챗봇 API 키는 `.env` 에 둡니다. 저장소에는 올리지 않습니다.
