var btn = document.querySelector(".button");

btn.addEventListener("click", function(){
    if (document.body.getAttribute("data-theme") == "light"){
        document.body.setAttribute("data-theme", "dark");
    } else {
        document.body.setAttribute("data-theme", "light");
    }
});
