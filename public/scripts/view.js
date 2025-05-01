const view = document.getElementById('view');

function openView(img){
    console.log(img);
    view.querySelector('img').src = img;
    view.classList.remove('hidden');
}

function closeView(){
    view.classList.add('hidden');
}