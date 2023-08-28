<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $topic = Topic::orderBy('id', 'DESC')->paginate(5);
        $likes = new Like();
        $trending = Topic::withCount('likes')
            ->having('likes_count', '!=', 0)
            ->orderByDESC('likes_count')
            ->limit(5)    
            ->get();
        $top_user = User::withCount('topic')
            ->having('topic_count', '!=', 0)
            ->orderByDESC('topic_count')
            ->limit(4)    
            ->get();
        return view('pages.home', compact('topic', 'likes', 'trending', 'top_user'));
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
