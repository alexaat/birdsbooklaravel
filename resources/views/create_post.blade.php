<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href='css/styles.css' rel='stylesheet' />

    </head>
    <body>
        <form action='/posts/create' method='POST' enctype='multipart/form-data'>
            @csrf
            <input type='file' name='file' accept="image/*">
            <textarea name='content'>
            </textarea>
            <input type='submit' value='POST'>
        </form>
    </body>
</html>

