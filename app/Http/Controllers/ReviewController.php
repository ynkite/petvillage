<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewController extends Controller
{
    public function index()
    {
        try {
            if (!Schema::hasTable('reviews')) {
                $reviews = new LengthAwarePaginator([], 0, 12, 1);
                return view('reviews.index', compact('reviews'));
            }

            $reviews = Review::where('is_approved', true)
                ->with('animal')
                ->orderBy('created_at', 'desc')
                ->paginate(12);

            return view('reviews.index', compact('reviews'));
        } catch (\Exception $e) {
            $reviews = new LengthAwarePaginator([], 0, 12, 1);
            return view('reviews.index', compact('reviews'));
        }
    }

    public function create()
    {
        try {
            if (Schema::hasTable('animals')) {
                $animals = Animal::where('status', 'adopted')->orderBy('name')->get();
            } else {
                $animals = collect([]);
            }
        } catch (\Exception $e) {
            $animals = collect([]);
        }
        return view('reviews.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'nullable|exists:animals,id',
            'adopter_name' => 'required|string|max:255',
            'adopter_contact' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reviews', 'public');
            $validated['image'] = $imagePath;
        }

        Review::create($validated);

        return redirect()->route('reviews.index')
            ->with('success', '입양 후기가 등록되었습니다. 승인 후 게시됩니다.');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }
}

