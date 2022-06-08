//Navbar
var header = document.getElementById("header");
window.addEventListener("scroll",function(){
    header.classList.toggle("sticky",window.scrollY > 0);
})
function myFunction(x) {
    if (x.matches) { // If media query matches
        header.classList.add("myfixedh");
    } else { 
        header.classList.remove("myfixedh");
    }
}
var x = window.matchMedia('(min-width: 991px)')
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes
