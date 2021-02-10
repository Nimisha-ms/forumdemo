<?php

namespace App\Filters;

use Illuminate\Http\Request;

use App\Models\User;

class ThreadFilters extends Filters
{
	protected $filters = ['by', 'popular'];

    public function by($username){

    	if($username != ''){
	    	$user = User::where('name', $username)->first();
	        return $this->builder->where('user_id', $user->id);
	     }
    }
    
    public function popular($popular){

        if($popular != ''){
        	$this->builder->getQuery()->orders = [];
        	return $this->builder->withCount('replies')->orderBy('replies_count', 'desc');
        }
        else{
            $this->builder->withCount('replies')->orderBy('replies_count', 'desc');
        }
    }
}
