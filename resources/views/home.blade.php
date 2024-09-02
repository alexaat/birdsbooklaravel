@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach($posts as $post)
                <div class="post-card">
                    <div class='post-header'>
                        {{ $post -> user_id }} -  {{ $post -> created }}
                    </div>
                    <div class='post-content'>
                        <img src="images/{{$post -> image }}">
                    </div>
                    <div class='post-footer'>
                        {{ $post -> content }}
                    </div>
                </div>
                @endforeach              
        </div>
    </div>
</div>
@endsection
