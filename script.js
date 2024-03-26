let currentIndex = 0;
const totalSlides = document.querySelectorAll('.slide').length;
const slideWidth = document.querySelector('.slide').clientWidth;
const carousel = document.querySelector('.slides');

function updateCarousel() {
    carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
}

function nextSlide() {
    if (currentIndex < totalSlides - 1) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    updateCarousel();
}

function prevSlide() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = totalSlides - 1;
    }
    updateCarousel();
}

document.querySelector('.arrow.prev').addEventListener('click', prevSlide);
document.querySelector('.arrow.next').addEventListener('click', nextSlide);

setInterval(nextSlide, 5000);

//linkagem de botões 

document.getElementById("btnmapa").addEventListener("click", function () {
    var urlMapa = "https://www.google.com.br/maps/place/R.+Ad%C3%A9lio+Pazinatto,+420+-+Jardim+Aeroporto+I,+Itu+-+SP,+13304-670/@-23.2821401,-47.2723274,21z/data=!4m6!3m5!1s0x94cf4569fa238df7:0x2665ccfde61af86c!8m2!3d-23.282129!4d-47.2723474!16s%2Fg%2F11c29tmqlf?entry=ttu";
    window.open(urlMapa, "_blank");
});

document.getElementById("btninstagram").addEventListener("click", function () {
    var urlInstagram = "https://www.instagram.com/rogerio_barbearia_itu?igsh=MXB4cWZ6MHhub2Fmeg=="
    window.open(urlInstagram, "_blank");
});

document.getElementById("btnfacebook").addEventListener("click", function () {
    var urlFacebook = ""
    window.open(urlFacebook, "_blank");
});