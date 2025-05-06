const url = "http://127.0.0.1:8000/post/like";

function _like(elem) {
    const parent = elem.parentNode;
    const id = parent.getAttribute("data-postId");
    const _token = parent.getElementsByName('_token').values();
    console.log(_token);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", url);

    xhr.onreadystatechange = () => {
        if (xhr.status === 200 && xhr.readyState === 4) {
            console.log(xhr.response);
        } else {
            console.log(xhr.response);
        }
    };

    xhr.send(`id=${id},checked=${elem.checked}`);
}
