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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->nullable()->constrained()->onDelete('set null');
            $table->string('adopter_name'); // 입양자 이름
            $table->string('adopter_contact')->nullable(); // 연락처 (선택)
            $table->string('title');
            $table->text('content');
            $table->integer('rating')->default(5); // 만족도 (1-5)
            $table->string('image')->nullable();
            $table->boolean('is_approved')->default(false); // 승인 여부
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

