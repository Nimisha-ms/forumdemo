<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class FavoritesController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except(['index','show']);
	}

    public function store(Reply $reply)
    {
    	$fav = new Favorite();
    	$fav['user_id'] = auth()->id(),
    	$fav['favorite_id'] = $reply->id();
    	$fav['favorited_type'] = get_class($reply);
    	$fav->save();
    }
}
