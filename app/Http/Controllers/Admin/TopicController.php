<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            $topic = Topic::orderByDESC('created_at');
            if ($request->search) {
                $topic = $topic->where('title', 'like', '%'.$request->search.'%')
                        ->orWhere('content', 'like', '%'.$request->search.'%');
            }
            $topic = $topic->paginate(10);
            return view('pages.admin.includes.topic-list', compact('topic'));
        }
        return view('pages.admin.topic.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.topic.create');
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
            'title.required'    => 'Judul Harus Diisi!',
            'title.min'         => 'Judul Harus Diisi :min Karakter',
            'title.max'         => 'Judul Diisi Maksimal :min Karakter',
            'content.required'  => 'Content Harus Diisi!',
            'content.min'       => 'Konten Harus Diisi Minimal :min Karakter',
            'image.max'         => 'Gambar Harus Kurang Dari :max kb'
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
            return redirect('/admin/topic')->with('success', 'Data Berhasil Disimpan!');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Disimpan!');
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
        //
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
        return view('pages.admin.topic.edit', compact('topic'));
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
        $data = $request->all();
        $topic = Topic::find($id);
        $validator = Validator::make($data, [
            'title'     => ['required', 'string', 'min:3', 'max:255'], 
            'content'   => ['required', 'min:3'],
            'image'     => ['image', 'max:2048'],
        ]);

        $topic->update($data);
        if ($topic) {
            return redirect()->route('admin.topic.index')->with('success', 'Data Has Been Updated');
        } else {
            return redirect()->back()->with('error', 'Data Error');
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
        $topic->delete();
            return response()->json([
                'status'    => true,
            ]);
    }
}
