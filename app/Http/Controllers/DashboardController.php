<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Topic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $topic = Topic::orderBy('id', 'DESC')->paginate(5);
        $likes = new Like();
        return view('pages.home', compact('topic', 'likes'));
    }

    public function searchTopic(Request $request)
    {
        $keyword = $request->keyword;
        $topic = Topic::where('title', 'like', '%'.$keyword.'%')->orWhereHas('user', function($q) use($keyword) {
        $q->where('full_name', 'like', '%'.$keyword.'%');
       })
       ->orderby('id', 'DESC')
       ->paginate(5);

       return view('pages.search', compact('topic'));
    }
}
