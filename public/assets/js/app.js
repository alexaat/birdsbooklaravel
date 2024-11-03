const host = 'http://localhost:8000';


document.addEventListener('DOMContentLoaded', () => {

    let likeClasses = ['likes','likes-amount','like-icon'];
    let dislikeClasses = ['dislikes','dislikes-amount','dislike-icon'];
   
    const postcards = document.getElementsByClassName('post-card');
    for (let i = 0; i < postcards.length; i++) {
        postcards[i].addEventListener('click', (e) => {
            let arr = Array.from(e.target.classList);
            if (arr.some( ai => likeClasses.includes(ai) )){
                console.log('like ',  postcards[i].dataset.post_id);
                saveLike( postcards[i].dataset.post_id, true);
            }           
            if (arr.some( ai => dislikeClasses.includes(ai) )){
                console.log('dislike ',  postcards[i].dataset.post_id);
                saveLike( postcards[i].dataset.post_id, false);
            }  
        });
    }  
    

 
}, false);


const saveLike = (post_id, like) => {    
    
    const url = 'likes';

    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    let formData = new FormData();
    formData.append('post_id', post_id);
    formData.append('is_like', like);


    const options = {
        method: 'POST',
        headers: {        
          'X-CSRF-TOKEN': token          
        },
        body: formData
      };

    fetch(url, options)  
    .catch(e => console.log(e));
   
}

