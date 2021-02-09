@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
              <form method="post" action="/threads">
                @csrf

                <div class="form-group">
                   <label for="title">Select channnel:</label>
                   <select name="channel_id" id="channel_id" class="form-control">
                    <option value="">Choose One</option>
                      @foreach($channels as $channel)
                      <option value="{{ $channel->id }}" 
                        {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                        {{ $channel->name }}
                      </option>
                      @endforeach
                   </select>
                   @if($errors->has('channel_id'))
                   <span class="text-danger">{{ $errors->first('channel_id') }}</span>
                   @endif
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ old('title') }}">   
                     @if($errors->has('title'))
                     <span class="text-danger">{{ $errors->first('title') }}</span>
                     @endif
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name="body" id="body" placeholder="Required body" rows=5>{{ old('body') }}</textarea>
                </div>

                 <button class="btn btn-primary" type="submit">Publish</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
