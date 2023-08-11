<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        return view('pages.home');
    }

    public function getDataTopic(Request $request)
    {
        $topic = Topic::all();
        return view('pages.includes.topic-home', compact('topic'));
    }
}
