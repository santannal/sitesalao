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

//acessando páginas 

function acessarPaginaPHP() {
    window.location.href = 'feedback/listar.php';
}