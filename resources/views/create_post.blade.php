@extends('layouts.app')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">    
        <div class="col-md-8">          
            <form action='/posts/create' method='POST' enctype='multipart/form-data' class='new-post-container shadow p-3 mb-5 bg-body rounded'>
                @csrf      
                <div class='new-post-header'>New Post</div>                            
                <div class='uploaded-file'>
                    <input type='file' name='file' accept='image/*' class='input-file' id='input-file' >
                </div>                
                <textarea name='content' class='new-post-content' rows=7 placeholder='type your post here...'></textarea>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif                
                <input type='submit' value='POST' class='submit-button'>
            </form>       
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#input-file').addEventListener('input', e => {
                const file = e.target.files[0];
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file); 
                fileReader.onload = function (){
                    const fileInputContainer = document.querySelector('.uploaded-file');
                    fileInputContainer.setAttribute('style',                `
                    background-image: url('${fileReader.result}');
                    background-size: contain;
                    `);
                }
            });
        });

 
</script>
@endsection


