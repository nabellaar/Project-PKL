<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $response = Response::orderByDESC('created_at');
            $search = $request->search;
            if ($search) {
                $response = $response->where('content', 'like', '%'.$search.'%')
                ->orWhereHas('user', function($q) use($search) {
                    $q->where('username', 'like', '%'.$search.'%');
                    $q->orWhere('full_name', 'like', '%'.$search.'%');
                    $q->orWhere('email', 'like', '%'.$search.'%');
                });
            }
            $response = $response->paginate(10);
            return view('pages.admin.includes.response-list', compact('response'));
        }
        return view('pages.admin.response.index');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Response::find($id);
        $response->delete();
            return response()->json([
                'status'    => true,
            ]);
    }
}
