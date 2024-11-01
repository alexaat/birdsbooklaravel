
window.addEventListener('load', function() {
    console.log('All assets are loaded')
})

document.addEventListener('DOMContentLoaded', () => {

    const likes = document.querySelector('.likes');
  
    likes.addEventListener('click', () => {
        console.log('like');
    });
    
    const dislikes = document.querySelector('.dislikes');
    dislikes.addEventListener('click', () => {
        console.log('dislikes');
    });   
}, false);

