const main = document.getElementById("main");
const aside = document.getElementById("aside");
const btnUp = document.getElementById("btn-up");
const userId = window.appData.user_id;
const apiUrl = window.appData.apiUrl;
const bottomOffset = 500;
const postUrl = apiUrl;
var loaded = false;
const clientHeight = window.innerHeight;

document.onscroll = () => {

    const clientPosition = window.scrollY;
    const pageHight = document.documentElement.scrollHeight;

    if(2000 <= clientPosition && btnUp.classList.contains("hidden")){
        btnUp.classList.add("fixed");
        btnUp.classList.remove("hidden");
    }else if(2000 >= clientPosition && btnUp.classList.contains("fixed")){
        btnUp.classList.add("hidden");
        btnUp.classList.remove("fixed");
    }

    if ((pageHight - clientHeight - bottomOffset) <= clientPosition && !loaded) {
        load();
    }
};
function load() {
    loaded = true;
    const xhr = new XMLHttpRequest();
    xhr.open("GET", postUrl);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = xhr.responseText;
            setTimeout(() => {
                loaded = false;
            }, 1000);
            create(JSON.parse(response));
        }
    };
    xhr.send();
}
function error(){
    alert('ابتدا وارد شوید.');
}

function create(response) {
    const html = response.html;
    main.insertAdjacentHTML('beforeend', html);
}

load();
