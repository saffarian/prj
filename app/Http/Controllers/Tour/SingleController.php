<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function index($id, Request $request)
    {
        $tour = Tour::with(['descriptions'])->findOrFail($id);
        $page = [
            'title' => $tour->title
        ];

        return view('tour.single', compact('tour', 'page'));
    }
}
