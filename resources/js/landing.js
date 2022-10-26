!function () { const e = document.documentElement; if (e.classList.remove("no-js"), e.classList.add("js"), document.body.classList.contains("has-animations")) { (window.sr = ScrollReveal()).reveal(".feature, .testimonial", { duration: 600, distance: "50px", easing: "cubic-bezier(0.5, -0.01, 0, 1.005)", origin: "bottom", interval: 100 }); const a = anime.timeline({ autoplay: !1 }), t = document.querySelector(".stroke-animation"); t.setAttribute("stroke-dashoffset", anime.setDashoffset(t)), a.add({ targets: ".stroke-animation", strokeDashoffset: { value: 0, duration: 2e3, easing: "easeInOutQuart" }, strokeWidth: { value: [0, 2], duration: 2e3, easing: "easeOutCubic" }, strokeOpacity: { value: [1, 0], duration: 1e3, easing: "easeOutCubic", delay: 1e3 }, fillOpacity: { value: [0, 1], duration: 500, easing: "easeOutCubic", delay: 1300 } }).add({ targets: ".fadeup-animation", offset: 1300, translateY: { value: [100, 0], duration: 1500, easing: "easeOutElastic", delay: function (e, a) { return 150 * a } }, opacity: { value: [0, 1], duration: 200, easing: "linear", delay: function (e, a) { return 150 * a } } }).add({ targets: ".fadeleft-animation", offset: 1300, translateX: { value: [40, 0], duration: 400, easing: "easeOutCubic", delay: function (e, a) { return 100 * a } }, opacity: { value: [0, 1], duration: 200, easing: "linear", delay: function (e, a) { return 100 * a } } }), e.classList.add("anime-ready"), a.play() } }();

// Sticky Navigation Menu Js

let nav = document.querySelector("nav");
let scrollBtn = document.querySelector(".scroll-button a");

let val;

window.onscroll = function () {
    if (document.documentElement.scrollTop > 20) {
        nav.classList.add("sticky");
        scrollBtn.style.display = "block";
    } else {
        nav.classList.remove("sticky");
        scrollBtn.style.display = "none";
    }
}

// Side Navigation Menu Js
let body = document.querySelector("body");
let navBar = document.querySelector(".navbar");
let menuBtn = document.querySelector(".menu-btn");
let cancelBtn = document.querySelector(".cancel-btn");

menuBtn.onclick = function () {
    navBar.classList.add("active");
    menuBtn.style.opacity = "0";
    menuBtn.style.pointerEvents = "none";
    body.style.overflowX = "hidden";
    scrollBtn.style.pointerEvents = "none";
}

cancelBtn.onclick = function () {
    navBar.classList.remove("active");
    menuBtn.style.opacity = "1";
    menuBtn.style.pointerEvents = "auto";
    body.style.overflowX = "auto";
    scrollBtn.style.pointerEvents = "auto";
}

// Side Navigation Bar Close While We click On Navigation Links

let navLinks = document.querySelectorAll(".menu li a");
for (var i = 0; i < navLinks.length; i++) {
    navLinks[i].addEventListener("click", function () {
        navBar.classList.remove("active");
        menuBtn.style.opacity = "1";
        menuBtn.style.pointerEvents = "auto";
    });
}

$(document).ready(function () {
    var height = $('.footer').height();
    $('.sect-t-footer').css('height', height);
});