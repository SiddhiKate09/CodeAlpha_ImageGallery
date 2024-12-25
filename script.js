let slideIndex = 1;

function openLightbox() {
  document.getElementById('lightbox').style.display = "block";
  showSlide(slideIndex);
}

function closeLightbox() {
  document.getElementById('lightbox').style.display = "none";
}

function currentSlide(n) {
  slideIndex = n;
  let images = document.querySelectorAll('.source img');
  let lightboxImage = document.getElementById('lightbox-image');
  lightboxImage.src = images[slideIndex - 1].src;
}

function changeSlide(n) {
  slideIndex += n;
  let images = document.querySelectorAll('.source img');
  
  if (slideIndex > images.length) {
    slideIndex = 1; 
  } else if (slideIndex < 1) {
    slideIndex = images.length; 
  }

  document.getElementById('lightbox-image').src = images[slideIndex - 1].src;
}

function showSlide(n) {
  let images = document.querySelectorAll('.source img');
  let lightboxImage = document.getElementById('lightbox-image');
  
  if (n > images.length) {
    slideIndex = 1;
  } else if (n < 1) {
    slideIndex = images.length;
  }
  
  lightboxImage.src = images[slideIndex - 1].src;
}
