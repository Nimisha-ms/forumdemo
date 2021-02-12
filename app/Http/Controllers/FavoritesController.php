<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Reply;
use App\Models\Favorite;

class FavoritesController extends Controller
{
	public function __construct(){
		//$this->middleware('auth')->except(['index','show']);
	}

    public function store(Reply $reply)
    {        
    	/*$fav = new Favorite();
    	$fav['user_id'] = auth()->id();
    	$fav['favorited_id'] = $reply->id;
    	$fav['favorited_type'] = get_class($reply);
    	$fav->save();
        return redirect()->back();*/

        if(auth()->check()){

            try{
                $reply->favorite();
                return redirect()->back();
            }
            catch(\Exception $e){
                //$this->fail('Did not expect to insert ');
                //return back()->withError($e->getMessage())->withInput();
                return back()->with('message','Already favorited');
            }

        }else{
            return view('auth.login');
        }
        //$reply->favorites()->create(['user_id' => auth()->id()]);
    }
}
