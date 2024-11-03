@extends('layouts.app')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-md-8">       
                @foreach($posts as $post)
                <div class="post-card shadow p-3 mb-5 bg-body rounded" data-post_id="{{$post->id}}">
                    <div class='post-header'>
                        <div>
                            <a href='profile/{{$post->user_id}}' class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $post -> name }}</a>
                        </div>
                        <div>
                            {{ $post -> created }}
                        </div>                        
                    </div>
                    <div class='post-content'>
                        <img src="images/{{$post -> image }}">
                    </div>
                    <div class='post-footer'>
                        <div class='post-info'>                        
                            <div class='likes-container'>                           
                                <div class='likes'>
                                    <div class='likes-amount'>16</div>
                                    <img src='icons/like_inactive.png' alt='like icon' class='like-icon'>
                                </div>
                                <div class='dislikes'>
                                    <div class='dislikes-amount'>1</div>
                                    <img src='icons/dislike_inactive.png' alt='like icon' class='dislike-icon'>
                                </div>
                            </div>
                        </div>
                        <div>
                            {{ $post -> content }}
                        </div>                      
                    </div>
                </div>
                @endforeach        
               
        </div>
    </div>
</div>
@endsection
