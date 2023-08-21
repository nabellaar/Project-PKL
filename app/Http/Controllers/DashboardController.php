<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $topic = Topic::orderBy('id', 'DESC')->paginate(5);
        return view('pages.home', compact('topic'));
    }

    public function searchTopic(Request $request)
    {
        $keyword = $request->keyword;
        $topic = Topic::where('title', 'like', '%'.$keyword.'%')->orWhereHas('user', function($q) use($keyword) {
        $q->where('name', 'like', '%'.$keyword.'%');
       })
       ->orderby('id', 'DESC')
       ->paginate(5);

       return view('pages.search', compact('topic'));
    }
}
