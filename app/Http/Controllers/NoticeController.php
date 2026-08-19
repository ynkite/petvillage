<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\LengthAwarePaginator;

class NoticeController extends Controller
{
    public function index()
    {
        try {
            if (!Schema::hasTable('notices')) {
                $notices = new LengthAwarePaginator([], 0, 10, 1);
                return view('notices.index', compact('notices'));
            }

            $notices = Notice::orderBy('is_important', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('notices.index', compact('notices'));
        } catch (\Exception $e) {
            $notices = new LengthAwarePaginator([], 0, 10, 1);
            return view('notices.index', compact('notices'));
        }
    }

    public function show(Notice $notice)
    {
        $notice->increment('views');
        return view('notices.show', compact('notice'));
    }
}

