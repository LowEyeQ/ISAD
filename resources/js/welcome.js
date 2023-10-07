
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');



window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a [href*=' + id + ']').classList.add('active');
            });
        };
    });
};
document.addEventListener('DOMContentLoaded', function () {
    const themeToggle = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme');

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


let imageWrappers = document.querySelectorAll(".img-wrapper");
const textOverlays = document.querySelectorAll(".text-overlay");




imageWrappers.forEach(function(wrapper, currentIndex, listObj) {
    wrapper.addEventListener("mouseenter", () => {
        wrapper.style.cursor = "pointer";
        console.log("movein");
        wrapper.getElementsByClassName("image")[0].style.filter = "blur(1px) brightness(0.4)";
        wrapper.getElementsByClassName("image")[0].style.transform = "scale(1.2)";
        wrapper.getElementsByClassName("text-overlay")[0].style.opacity = 1 ;
    });

    wrapper.addEventListener("mouseleave", () => {
        console.log("moveout");
        wrapper.getElementsByClassName("text-overlay")[0].style.opacity = 0 ;
        wrapper.getElementsByClassName("image")[0].style.filter = "none";
        wrapper.getElementsByClassName("image")[0].style.transform = "scale(1)";
    });


});






const spans = document.querySelectorAll('.word span');

spans.forEach((span, idx) => {
	span.addEventListener('click', (e) => {
		e.target.classList.add('active');
	});
	span.addEventListener('animationend', (e) => {
		e.target.classList.remove('active');
	});

	// Initial animation
	setTimeout(() => {
		span.classList.add('active');
	}, 750 * (idx+1))
});
