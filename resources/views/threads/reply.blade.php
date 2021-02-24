 <reply :attributes= "{{ $reply }}" inline-template>

 <div id= "reply-{{ $reply->id }}" class="panel panel-default">
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

              <favorite :reply={{ $reply }}></favorite>
	 		<!-- <form method="post" action="{{ route('favreply', $reply->id) }}">
	 			@csrf
	 			<button type="submit" class="btn btn-secondary flex"
	 			{{ $reply->isFavorited() ? 'disabled' : '' }}
	 			>
	 				{{ $reply->favorites->count() }}
	 			{{ Illuminate\Support\Str::plural( 'Favorite', $reply->favorites->count() ) }} 
	 			</button>

	 		</form>	 -->
	 		  @endif	
 		</div>

 	</div>

                
                <div class="panel-body">
                	
                	<div v-if="editing"> 
                                <div class="form-group">
                                        <textarea class="form-control" v-model="body"></textarea>              
                                </div>                		
                                <button class="btn btn-xs btn-primary" @click="update">Update</button>

                                <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
                	</div>
                	<div v-else v-text="body"></div>
                </div>


                @can('update', $reply)
                <div class="panel-footer level">
                	<button class="btn btn-info btn-xs mr-1
                	" @click="editing = true">Edit</button>

                         <button class="btn btn-info btn-xs btn-danger mr-1
                        " @click="destroy">Delete</button>
                        
               <!--   <form method="post" action="/replies/{{ $reply->id }}">
                 	@csrf
                 	 @method('DELETE')
                 	 <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                 </form> -->
                </div>
                @endif
</div>                
 </reply>