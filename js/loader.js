// wait for the page to load fully

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        document.getElementById("loader").style.display = "none";
        document.getElementById("content").style.display = "block";
}, 2000);

});
