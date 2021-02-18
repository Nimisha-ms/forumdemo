<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    /*public function thread()
    {
        return $this->belongsTo(Thread::class);

    }*/

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function favorites(){
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
        $this->favorites()->create(['user_id' => auth()->id()]);
    }

    public function isFavorited(){        
        //return $this->favorites()->where('user_id', auth()->id())->exists();
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }
}
