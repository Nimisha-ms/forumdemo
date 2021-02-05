@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading`">
                    <a href="#">{{ $thread->creator->name }}</a> posted:
                    {{ $thread->title }}</div>

                <div class="panel-body">
                  {{ $thread->body }}
                </div>

                <hr>
            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-md-8 col-md-offset-2">                 
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach            
        </div>
    </div>

        @if(auth()->check())
       <div class="row">
            <div class="col-md-8 col-md-offset-2">                     
              <form method="post" action="{{ $thread->path().'/replies' }}">
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
@endsection
