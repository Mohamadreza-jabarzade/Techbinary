var likeUrl = "http://127.0.0.1:8000/like/post";
var csrfTokenInLike = window.appData.csrf;

function _like(elem) {
    const parent = elem.parentNode;
    const parentOfparent = parent.parentNode;
    const id = parent.getAttribute("data-postId");
    var showLikes = parentOfparent.querySelector('.showLikes').innerHTML;

    const checked = elem.checked ? 1 : 0;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", likeUrl);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {
            if (xhr.response == "true"){
                parentOfparent.querySelector('.showLikes').innerHTML = parseInt(showLikes) + 1;
            }
            if (xhr.response == "false"){
                parentOfparent.querySelector('.showLikes').innerHTML = parseInt(showLikes) - 1;
            }
            if (xhr.response == "error"){
                parentOfparent.querySelector('.showLikes').innerHTML = "Server error";
            }
        }
    };

    const data = `_token=${csrfTokenInLike}&id=${id}&checked=${checked}`;
    xhr.send(data);
}
