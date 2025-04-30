const url = "https://mocki.io/v1/7cb75a23-a869-4b9d-b35b-5246c3fd318e";

function _like(elem) {
    const parent = elem.parentNode;
    const id = parent.getAttribute("data-postId")
    console.log(id + " : " + elem.checked);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", url);

    xhr.onreadystatechange = () => {
        if (xhr.status === 200 && xhr.readyState === 4) {
            console.log("done !");
        } else {
            console.log("error : " + xhr.status);
        }
    };

    xhr.send(`id=${id}`);
}
