document.addEventListener('DOMContentLoaded', () => {
    const alerts = document.querySelectorAll('.alert');

    alerts.forEach(alert => {
        setTimeout(() => {
            hideAlert(alert);
        }, 5000);
    });
});


function hideAlert(alert) {
    console.log(alert);
    alert.classList.remove("alert-show");
    alert.classList.add("alert-hide");
    setTimeout(()=>{
        delete(alert);
        remove(alert);
    },1000);
}