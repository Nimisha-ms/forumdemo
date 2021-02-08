<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class RepliesController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function store($channelId, Thread $thread, Request $request){
        
    	$thread->addReply([
    		'body' => $request->get('body'),
    		'user_id' => auth()->id()
    	]);

    	return back();
    }
}
