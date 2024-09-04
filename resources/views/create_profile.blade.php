@extends('layouts.app')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">    
        <div class="col-md-8">
          
            <form action='/profile/create' method='POST' enctype='multipart/form-data' class='new-post-container shadow p-3 mb-5 bg-body rounded'>
                @csrf      
                <div class='new-post-header'>Edit Profile Image</div>               
                
                @if($user['image']) 
                    <div
                        class='uploaded-profile border shadow mx-auto my-5'
                        style="background-image: url(/profiles/{{$user['image']}})"
                    >                       
                        <input type='file' name='file' accept='image/*' class='input-file ' id='profile-input-file' >
                    </div>
                @elseif($user['icon_letters'])
                    <div class='uploaded-profile border shadow mx-auto my-5 d-flex align-items-center justify-content-center display-2 with-letters'>
                        <div class='profile-letter'> {{ $user['icon_letters'] }} </div>
                        <input type='file' name='file' accept='image/*' class='d-none input-file' id='profile-input-file' >
                    </div>
                @else
                    <div class='uploaded-profile border shadow mx-auto my-5' style="background-image: url(/icons/unknown_user.png)">                       
                        <input type='file' name='file' accept='image/*' class='input-file ' id='profile-input-file' >
                    </div>
                @endif

                <input type='submit' value='SAVE' class='submit-button'>
            </form>       
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#profile-input-file').addEventListener('change', e => {
                const file = e.target.files[0];
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file); 
                fileReader.onload = function (){
                    const fileInputContainer = document.querySelector('.uploaded-profile');
                    fileInputContainer.setAttribute('style',                `
                    background-image: url('${fileReader.result}');
                    background-size: contain;
                `);
                }
                const profileLetterElement =  document.querySelector('.profile-letter');
                if(profileLetterElement) {
                    profileLetterElement.style.display = 'none';
                }               
            });

            const icon = document.querySelector('.with-letters');
            if(icon) {
                icon.addEventListener('click', () => {
                document.querySelector('#profile-input-file').click();
            });
            }
        });

 
</script>
@endsection
