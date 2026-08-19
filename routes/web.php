<?php
use App\Http\Controllers\HOMEController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

// 홈  
Route::get('/', [HomeController::class, 'index'])->name('home');

// 동물 관련
Route::resource('animals', AnimalController::class);

// 공지사항
Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
Route::get('/notices/{notice}', [NoticeController::class, 'show'])->name('notices.show');

// 입양 후기
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');

// 센터 안내
Route::get('/centers', [CenterController::class, 'index'])->name('centers.index');
Route::get('/centers/{center}', [CenterController::class, 'show'])->name('centers.show');

// 입양 안내
Route::get('/guide', [App\Http\Controllers\GuideController::class, 'index'])->name('guide.index');

// FAQ
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq.index');

// 후원하기
Route::get('/donate', [App\Http\Controllers\DonateController::class, 'index'])->name('donate.index');

// 챗봇
//Route::post('/chatbot/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');
Route::post('/chatbot', [ChatbotController::class, 'chat'])->name('chatbot.chat');