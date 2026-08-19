<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 이름
            $table->string('species'); // 종류 (개, 고양이 등)
            $table->string('breed')->nullable(); // 품종
            $table->integer('age')->nullable(); // 나이
            $table->string('gender'); // 성별 (수컷, 암컷)
            $table->text('description')->nullable(); // 설명
            $table->string('location')->nullable(); // 위치
            $table->string('status')->default('available'); // 상태 (available, adopted, pending)
            $table->string('image')->nullable(); // 이미지 경로
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};

