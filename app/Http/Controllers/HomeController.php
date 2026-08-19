<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        // 최근 입양 가능한 동물
        try {
            if (Schema::hasTable('animals')) {
                $recentAnimals = \App\Models\Animal::where('status', 'available')
                    ->orderBy('created_at', 'desc')
                    ->limit(4)
                    ->get();
            } else {
                $recentAnimals = collect([]);
            }
        } catch (\Exception $e) {
            $recentAnimals = collect([]);
        }

        // 최근 입양 후기
        try {
            if (Schema::hasTable('reviews')) {
                $recentReviews = \App\Models\Review::where('is_approved', true)
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get();
            } else {
                $recentReviews = collect([]);
            }
        } catch (\Exception $e) {
            $recentReviews = collect([]);
        }

        // 공지사항
        try {
            if (Schema::hasTable('notices')) {
                $notices = \App\Models\Notice::orderBy('is_important', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            } else {
                $notices = collect([]);
            }
        } catch (\Exception $e) {
            $notices = collect([]);
        }

        return view('home', compact('recentAnimals', 'recentReviews', 'notices'));
    }
}

