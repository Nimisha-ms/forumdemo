<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Reply;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Filters\ThreadFilters;
use Illuminate\Support\Str;

class ThreadsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(Channel $channel, Request $request)
    public function index(Channel $channel, ThreadFilters  $filters)
    {        
        $threads = $this->getThreads($channel, $filters);
        //$threads = $threads->withCount('replies')->get();
       /* if($channel->exists)
        {
            $threads = $channel->threads()->latest();
        }else{
            $threads = Thread::latest();               
        }

        //Get thread by username:
        if($username = $request->input('by'))
        {
            //$username = 'AlanWill';            
            $user = User::where('name', $username)
                    ->first();

            $threads = Thread::where('user_id', $user->id);
        }

        //Check popular
        if($popular = $request->input('popular'))
        {

        }

        $threads = $threads->withCount('replies')->get();
*/

        //return Thread::filter($filter)->get();
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
    public function store(Channel $channel, Request $request, Thread $thread)
    {
         $validateData = $request->validate([
                'title' => 'required',                                
                'channel_id' => 'required'                               
             ],[
                'title.required' => 'Title is required',
                'channel_id.required' => 'Channel is required'
            ]
        );

        //$new_channel = Channel::factory()->create();    
        
        //dd($request->all());
        $ins_thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => $request->get('channel_id'),    
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        return redirect($thread->path())
            ->with('flash','Your thread has been published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {           
        //return $thread->replies;
        return view('threads.show', [
            'thread' =>  Thread::withCount('replies')->find($thread->id),
            'replies' => $thread->replies()->paginate(5)
        ]);
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

    public function getThreads(Channel $channel, ThreadFilters  $filters){

        $threads = Thread::with('channel')->latest()->withCount('replies')->filter($filters);

        if($channel->exists)
        {
            $threads = $channel->threads()->withCount('replies')->latest();
        }

        return $threads->get();
    }

    public function destroy($channel, Thread $thread){       

        //if($thread->user_id != auth()->id()){

        $this->authorize('update', $thread);
            //abort(403, 'You do not have permission to delete this thread');
        ///

        $thread->replies()->delete();
        $thread->delete();
        return redirect('/threads');
    }
}
