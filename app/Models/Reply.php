<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $guarded = [];

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
}
