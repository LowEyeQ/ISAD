/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
var sections = document.querySelectorAll('section');
var navLinks = document.querySelectorAll('header nav a');
window.onscroll = function () {
  sections.forEach(function (sec) {
    var top = window.scrollY;
    var offset = sec.offsetTop - 150;
    var height = sec.offsetHeight;
    var id = sec.getAttribute('id');
    if (top >= offset && top < offset + height) {
      navLinks.forEach(function (links) {
        links.classList.remove('active');
        document.querySelector('header nav a [href*=' + id + ']').classList.add('active');
      });
    }
    ;
  });
};
document.addEventListener('DOMContentLoaded', function () {
  var themeToggle = document.getElementById('theme-toggle');
  var currentTheme = localStorage.getItem('theme');

  // ตรวจสอบค่า theme ใน localStorage และกำหนดค่าเริ่มต้น
  if (currentTheme === 'dark') {
    document.body.classList.add('dark');
  }

  // เปลี่ยน theme โดยคลิกที่ปุ่ม
  themeToggle.addEventListener('click', function () {
    if (document.body.classList.contains('dark')) {
      document.body.classList.remove('dark');
      localStorage.setItem('theme', 'light');
    } else {
      document.body.classList.add('dark');
      localStorage.setItem('theme', 'dark');
    }
  });
});
var imageWrappers = document.querySelectorAll(".img-wrapper");
var textOverlays = document.querySelectorAll(".text-overlay");
imageWrappers.forEach(function (wrapper, currentIndex, listObj) {
  wrapper.addEventListener("mouseenter", function () {
    wrapper.style.cursor = "pointer";
    console.log("movein");
    wrapper.getElementsByClassName("image")[0].style.filter = "blur(1px) brightness(0.4)";
    wrapper.getElementsByClassName("image")[0].style.transform = "scale(1.2)";
    wrapper.getElementsByClassName("text-overlay")[0].style.opacity = 1;
  });
  wrapper.addEventListener("mouseleave", function () {
    console.log("moveout");
    wrapper.getElementsByClassName("text-overlay")[0].style.opacity = 0;
    wrapper.getElementsByClassName("image")[0].style.filter = "none";
    wrapper.getElementsByClassName("image")[0].style.transform = "scale(1)";
  });
});
/******/ })()
;