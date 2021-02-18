<?php

namespace App\Models;

use App\Filters\ThreadFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['creator', 'channel'];

    protected $table = "threads";


    public static function boot(){
        parent::boot();

        
        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });

        /*static::addGlobalScope('creator', function($builder) {
            $builder->withCount('creator');
        });*/
    }

    public function path(){
    	//return '/threads/'. $this->id;
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
    	 return $this->hasMany(Reply::class);
         //->withCount('favorites')
        // ->with('owner');
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function addReply($reply){
    	$this->replies()->create($reply);
    }

    public function scopeFilter($query, ThreadFilters $filters)
    {
        return $filters->apply($query);
    }
}
