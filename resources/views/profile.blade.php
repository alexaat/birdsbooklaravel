@extends('layouts.app')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="bio">
                {{ $user['name'] }} 
            </div>
                @foreach($posts as $post)
                <div class="post-card shadow p-3 mb-5 bg-body rounded">
                    <div class='post-header'>
                        <div>
                            {{ $post -> name }} 
                        </div>
                        <div>
                            {{ $post -> created }}
                        </div>                        
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