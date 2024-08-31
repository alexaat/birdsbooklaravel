<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href='css/styles.css' rel='stylesheet' />

    </head>
    <body>

        @foreach($posts as $post)
        <div>
            <div class='post-header'>
                {{ $post['user_id'] }} -  {{ $post['created'] }}
            </div>
            <div class='post-content'>
                <img src="images/{{$post['image']}}">
            </div>
            <div class='post-footer'>
                {{ $post['content'] }}
            </div>
        </div>
        @endforeach

    </body>
</html>
