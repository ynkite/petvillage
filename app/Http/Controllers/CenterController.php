<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::where('is_active', true)
            ->orderBy('region')
            ->orderBy('name')
            ->get();

        return view('centers.index', compact('centers'));
    }

    public function show(Center $center)
    {
        return view('centers.show', compact('center'));
    }
}

