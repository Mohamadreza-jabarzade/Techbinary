const button = document.querySelector('#submit');
const err = document.querySelector('#err');
const form = document.querySelector("form");

const digits = document.querySelectorAll('#inputs input');
digits.forEach((digit) => {
    digit.addEventListener("input", (e) => {
        digit.value = digit.value.replace(/[^0-9]/g, '');
        button.disabled = !valid();
    });
});

function valid() {
    var is = 0;
    for (let digit of digits) {
        if (digit.value == null || digit.value == "") {
            break;
        } else {
            is++;
        }
    }
    if (is === 6) {
        return true;
    } else {
        is = 0;
        return false;
    }
}

form.addEventListener('submit', (e) => {
    if (valid() === false) {
        err.classList.remove("hidden");
        button.disabled = !valid();
        e.preventDefault();
    }
});

const timer = document.getElementById("timer");
var time = 5;
function setTimer() {
    if (time >= 1) {
        setTimeout(() => {
            time--;
            timerText();
        }, 1000)
    } else {
        console.log("end");
        timer.parentNode.disabled = false;
        timer.parentNode.innerHTML = "ارسال کد";
    }

}

function timerText() {
    timer.innerHTML = time;
    setTimer();
}

timerText();