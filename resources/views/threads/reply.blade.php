 <div class="panel panel-default">
 	<div class="level">
 		<h5 class="flex">
 		<a href="{{ route('profile', $reply->owner) }}" class="">
 			{{ $reply->owner->name }}
 		</a> said  {{ $reply->created_at->diffforHumans() }}
 		 </h5>
 		<div>
 			<!--@if(session('message'))
				{{ session('message') }}
			@endif-->
 		</div>
 		<div>
 			  @if (Auth::check())
	 		<form method="post" action="{{ route('favreply', $reply->id) }}">
	 			@csrf
	 			<button type="submit" class="btn btn-secondary flex"
	 			{{ $reply->isFavorited() ? 'disabled' : '' }}
	 			>
	 				{{ $reply->favorites->count() }}
	 			{{ Illuminate\Support\Str::plural( 'Favorite', $reply->favorites->count() ) }} 
	 			</button>

	 		</form>	
	 		  @endif	
 		</div>

 	</div>

                
                <div class="panel-body">
                  {{ $reply->body }}
                </div>
</div>                