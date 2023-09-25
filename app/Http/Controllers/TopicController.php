<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $topic = Topic::where('user_id', Auth::user()->id)
            ->paginate(5);
            return view('pages.includes.topic-list', compact('topic'));
        }
        return view('pages.topics',);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title'     => ['required', 'string', 'min:3', 'max:255'], 
            'content'   => ['required', 'min:3'],
            'image'     => ['image', 'max:2048'],
        ],
        [
            'title.required'    => 'The title must be filled in!',
            'title.min'         => 'Title Must be filled in :min Characters',
            'title.max'         => 'The title should be filled with a maximum of :min characters',
            'content.required'  => 'Content must be filled in!',
            'content.min'       => 'Content must be filled with a minimum of :min characters',
            'image.max'         => 'The image must be less than :max kb'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $topic = Topic::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'slug'      => Str::slug($request->title),
            'user_id'   => Auth::user()->id,
            'status'    => 1
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext  = $file->getClientOriginalExtension();
            $newName = Str::slug($request->title).'-'.md5(uniqid(rand(), true)).$ext;
            $file->move(public_path('img/'), $newName);
            $topic->image = $newName;
            $topic->save();
        }

        if ($topic) {
            return redirect('/')->with('success', 'Data has been successfully saved!');
        } else {
            return redirect()->back()->with('error', 'Data failed to be saved!');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic_id   = decrypt($id);
        $topic      = Topic::with(['response' => function($q){
            $q->where('status', 1);
        }])
            ->where('id', $topic_id)
            ->withCount('response')
            ->first();
        return view('pages.response', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        return view('pages.includes.edit-topic', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data = $request->all();
        $validator = Validator::make($data, [
            'title'     => ['required', 'string', 'min:3', 'max:255'], 
            'content'   => ['required', 'min:3'],
            'image'     => ['max:2048'],
        ],
        [
            'title.required'    => 'The title must be filled in!',
            'title.min'         => 'Title Must be filled in :min Characters',
            'title.max'         => 'The title should be filled with a maximum of :min characters',
            'content.required'  => 'Content must be filled in!',
            'content.min'       => 'Content must be filled with a minimum of :min characters',
            'image.max'         => 'The image must be less than :max kb'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation failed',
                'data'      => $validator->errors(),
            ]);
        }

        $topic = Topic::find($id);

        $topic->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')){
            $path = 'img/.$topic->image';
            if (is_file($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext  = $file->getClientOriginalExtension();
            $newName = Str::slug($request->title).'-'.md5(uniqid(rand(), true)).$ext;
            $file->move(public_path('img/'), $newName);
            $topic->image = $newName;
            $topic->save();
        }

        if ($topic) {
            return response()->json([
                'status'    => true,
                'message'   => 'Data has been successfully saved',
                'data'      => $topic
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data failed to be saved',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);
        $path = 'img/.$topic->image';
        if (is_file($path)) {
            unlink($path);
        }
        $topic->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Data has been successfully deleted!'
        ]);
    }
}
