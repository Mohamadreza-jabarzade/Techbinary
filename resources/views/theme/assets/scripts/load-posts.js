const main = document.getElementById("main");
const aside = document.getElementById("aside");
const btnUp = document.getElementById("btn-up");
const bottomOffset = 500;
const _url = "https://mocki.io/v1/e16771af-9618-4112-873f-6442b3070053";
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
    xhr.open("GET", _url);
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




function create(response) {
    response.forEach((elem) => {




            let item =
                `
        <div class="post-wrapper" data-aos="zoom-in-up">
                        <!-- Left Content -->
                        <div class="post-left">
        
                            <!-- Top Section -->
                            <div class="post-author">
                                <img src="assets/images/images 1.png" alt="Author" class="post-author-img" />
                                <span class="post-author-text"> ${elem.writer} | ${elem.date}  </span>
                            </div>
        
                            <!-- Main Content -->
                            <a href="#" class="post-content group">
                                <h1 class="post-title">${elem.title}</h1>
                                <p class="post-excerpt truncate">
                                ${elem.body}
                                </p>
                            </a>
        
                            <!-- Bottom Section -->
                            <div class="post-footer">
                                <span class="text-sm">
                                    <a href="#" class="post-tag">${elem.category}</a> | ${elem.read}
                                </span>
                                <label class="cursor-pointer" data-postid="${elem.id}">
                                    <input type="checkbox" name="like" onchange="_like(this)" class="like-checkbox peer" />
                                    <div class="like-icon-wrapper">
                                        <i class="like-icon fa fa-heart"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
        
                        <!-- Image Preview -->
                        <a href="#" class="post-thumbnail-link">
                            <img src="assets/images/image-4 1.png" alt="Post Thumbnail" class="post-thumbnail-img" />
                        </a>
                    </div>
            `;
            main.insertAdjacentHTML('beforeend', item);


    });



}

load();