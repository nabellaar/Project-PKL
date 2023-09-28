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
        $topic = Topic::with(['response' => function($q){
            $q->where('status', 1);
        }])
        ->where('status', 1)
        ->withCount('response')
        ->orderBy('id', 'DESC')
        ->paginate(5);
        $likes = new Like();
        $trending = Topic::withCount('likes')
            ->where('status', 1)
            ->having('likes_count', '!=', 0)
            ->orderByDESC('likes_count')
            ->limit(5)    
            ->get();
        $top_user = User::withCount(['topic' => function($q){
            $q->where('status', 1);
        }])
            ->where('status', 1)
            ->having('topic_count', '!=', 0)
            ->orderByDESC('topic_count')
            ->limit(5)    
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
       $user = User::where('username', 'like', '%'.$keyword.'%')
            ->orWhere('full_name', 'like', '%'.$keyword.'%')
            ->orWhere('email', 'like', '%'.$keyword.'%')
            ->orWhere('no_handphone', 'like', '%'.$keyword.'%')
            ->where('status', 1)
            ->get();

       return view('pages.search', compact('topic', 'user'));
    }
}
