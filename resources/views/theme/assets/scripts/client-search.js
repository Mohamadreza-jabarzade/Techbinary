const form = document.getElementById("search");

form.addEventListener("submit", function (e) {
    let input = form.querySelector("input");
    if (input.value.length == "") {
        e.preventDefault();
        return;
    }
});