const tbody = document.getElementById('rows');
const rows = tbody.querySelectorAll('tr');
const noResult = document.getElementById("noResult");

function search(text) {
    let found = false;
    rows.forEach(element => {
        if (element.querySelector('td').getAttribute('data-search') === "on" && element.textContent.toLowerCase().includes(text.toLowerCase())) {
            element.classList.remove('hidden');
            found = true;
        } else {
            element.classList.add('hidden');
        }
    });
    noResult.classList.toggle('hidden',found);

}