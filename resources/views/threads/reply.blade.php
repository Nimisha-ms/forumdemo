 <div class="card-header">
                <a href="#">{{ $reply->owner->name }}</a> said  {{ $reply->created_at->diffforHumans() }}...</div>
                <div class="card-body">
                  {{ $reply->body }}
                </div>