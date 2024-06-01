const track = document.querySelector('.carousel-track');
const slides = Array.from(track.children);
const nextButton = document.getElementById('carousel-next');
const prevButton = document.getElementById('carousel-prev');

let slideWidth = slides[0].getBoundingClientRect().width;

const setSlidePosition = (slide, index) => {
    slide.style.left = (slideWidth + 10) * index + 'px';
};

slides.forEach(setSlidePosition);

const moveToSlide = (track, currentSlide, targetSlide) => {
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
};

nextButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide') || slides[0];
    let nextSlide = currentSlide.nextElementSibling;
    if (!nextSlide) {
        nextSlide = slides[0];
    }

    moveToSlide(track, currentSlide, nextSlide);
});

prevButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide') || slides[0];
    let prevSlide = currentSlide.previousElementSibling;
    if (!prevSlide) {
        prevSlide = slides[slides.length - 1];
    }

    moveToSlide(track, currentSlide, prevSlide);
});

// Set the first slide as the current slide
slides[0].classList.add('current-slide');

// Adjust slide width on window resize
window.addEventListener('resize', () => {
    slideWidth = slides[0].getBoundingClientRect().width;
    slides.forEach(setSlidePosition);
});
