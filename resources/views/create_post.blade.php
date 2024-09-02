@extends('layouts.app')


@section('content')
<form action='/posts/create' method='POST' enctype='multipart/form-data'>
    @csrf
    <input type='file' name='file' accept="image/*">
    <textarea name='content'>
    </textarea>
    <input type='submit' value='POST'>
</form>
@endsection


