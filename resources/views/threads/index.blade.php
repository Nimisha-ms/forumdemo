@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @forelse ($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ '/threads/'.$thread->channel->slug.'/'.$thread->id }}">
                                        {{ $thread->title }}
                                    </a>
                                </h4>

                                <a href="{{ '/threads/'.$thread->channel->slug.'/'.$thread->id }}">
                                    {{ $thread->replies_count }}

                                    {{ Illuminate\Support\Str::plural( 'Reply', $thread->replies_count ) }} 
                                     
                                </a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="body">{{ $thread->body }}</div>
                        </div>
                    </div>
                @empty
                    <p>There are no relevant results at this time.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
