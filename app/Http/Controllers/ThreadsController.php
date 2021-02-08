<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Reply;
use App\Models\Channel;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function __construct(){
        //$this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel)
    {        
        if($channel->exists)
        {
            //$channelId = Channel::where('slug', $channelSlug)->first()->id;
            //$threads = Thread::where('channel_id', $channelId)->latest()->get();

            $threads = $channel->threads()->latest()->get();
        }else{
            $threads = Thread::latest()->get();               
        }
        return view('threads.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {          
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Thread $thread)
    {
         $validateData = $request->validate([
                'title' => 'required',                                
             ],[
                'title.required' => 'Title is required'
            ]
        );

        $new_channel = Channel::factory()->create();    
        
        //dd($request->all());
        $ins_thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => $new_channel->id,    
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {   
        $thread = Thread::find($thread->id);       
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('threads.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
