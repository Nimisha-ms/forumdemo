 <div class="panel panel-default">
 	<div class="level">
 		<a href="#" class="flex">
 			{{ $reply->owner->name }}
 		</a> said  {{ $reply->created_at->diffforHumans() }}...

 		<div>
	 		<form action="">
	 			<button type="submit" class="btn btn-primary btn-sm pull-right">
	 				Favorite
	 			</button>
	 		</form>		
 		</div>

 	</div>

                
                <div class="panel-body">
                  {{ $reply->body }}
                </div>
</div>                