@extends('layouts.app')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">    
        <div class="col-md-8">
          
            <form action='/profile/create' method='POST' enctype='multipart/form-data' class='new-post-container shadow p-3 mb-5 bg-body rounded'>
                @csrf      
                <div class='new-post-header'>Edit Profile</div>                            
                <div class='uploaded-file'>
                    <input type='file' name='file' accept='image/*' class='input-file' id='input-file' >
                </div>                
                <input type='submit' value='SAVE' class='submit-button'>
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
