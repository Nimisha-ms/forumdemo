<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Reply;


class RepliesController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function store($channelId, Thread $thread,Request $request){

        //return redirect("/threads/temporibus/54");
    	$thread->addReply([
    		'body' => $request->get('body'),
    		'user_id' => auth()->id()
    	]);

    	return redirect()->back()->with('flash', 'Your reply has been left.');
    }

    public function destroy(Reply $reply){

       /* if($reply->user_id != auth()->id()){
            return response([],403);
        }*/

        $this->authorize('update', $reply);

        $reply->delete();
        return back();
    }
}
