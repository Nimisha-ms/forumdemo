@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
                
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach            

                {{ $replies->links() }}

              @if(auth()->check())
               <div class="row">
                    <div class="col-md-8 col-md-offset-2">                     
                      <form method="post" action="{{ '/threads/'.$thread->channel->id.'/'.$thread->id.'/replies' }}">
                        @csrf 
                            <div class="form-group">
                            <label for="body">Reply:</label>
                            <textarea class="form-control" name="body" id="body" placeholder="Required body" rows=5 required></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                      </form>                
                    </div>
                </div>
                @else
                <p class="text-center">Please <a href="{{ route('login') }}">signin</a> to participate in this discussion.</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->creator->name }}</a>, and currently
                            has {{ $thread->replies_count }} comments.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
