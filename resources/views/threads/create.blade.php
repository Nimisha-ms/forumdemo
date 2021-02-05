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
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title">   
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name="body" id="body" placeholder="Required body" rows=5 required></textarea>
                </div>

                 <button class="btn btn-primary" type="submit">Publish</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
