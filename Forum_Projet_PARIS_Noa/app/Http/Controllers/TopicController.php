<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except(['index','show']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::latest()->paginate(10);

        return view("topics.index", compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $topic = auth()->user()->topics()->create($data);

        return redirect()->route('topics.show', $topic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        return view('topics.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view('topics.edit' , compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $data = $request->validate([

            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $topic->update($data);

        return redirect()->route('topics.show', $topic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);
        Topic::destroy($topic->id);

        return redirect('/');
    }
}
