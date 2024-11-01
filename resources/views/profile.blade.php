@extends('layouts.app')

@section('content')
<div class='container-md d-flex'>
    <div class='col-md-4 d-none d-md-block'>
        <div class="position-fixed bio shadow p-3 mb-5 bg-body rounded">            

            
            @if($user['email'])
                <a href='/profile/create' class='text-secondary' style='text-decoration: none'>
                        @if($user['image']) 
                            <div class='icon shadow border clickable' style="background-image: url(/profiles/{{$user['image']}})">
                            </div>
                        @elseif($user['icon_letters'])
                            <div class='icon shadow border d-flex align-items-center justify-content-center display-2 clickable'>
                                {{ $user['icon_letters'] }}   
                            </div>
                        @else
                            <div class='icon shadow border clickable' style="background-image: url(/icons/unknown_user.png)">                        
                            </div>
                        @endif 
                </a> 
            @else
                <div class='text-secondary'>
                        @if($user['image']) 
                            <div class='icon shadow border' style="background-image: url(/profiles/{{$user['image']}})">
                            </div>
                        @elseif($user['icon_letters'])
                            <div class='icon shadow border d-flex align-items-center justify-content-center display-2'>
                                {{ $user['icon_letters'] }}   
                            </div>
                        @else
                            <div class='icon shadow border' style="background-image: url(/icons/unknown_user.png)">                        
                            </div>
                        @endif 
                </div> 
            @endif



            <div class='my-4'>
                {{ $user['name'] }}   
            </div>
            @if($user['email'])
                <div>
                    {{ $user['email'] }}   
                </div>
            @endif
        </div>    
    </div>

    <div class='col-md-8'>
        @if(count($posts) == 0)               
            <div class="post-card shadow p-3 mb-5 bg-body rounded display-5 d-flex align-items-center justify-content-center text-secondary" style='height: 350px'>
                No posts yet            
            </div>              
           @else
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
                        <img src="/images/{{$post -> image }}">
                    </div>
                    <div class='post-footer'>
                        {{ $post -> content }}
                    </div>
                </div>
                @endforeach            
        @endif
    </div>

</div>
@endsection