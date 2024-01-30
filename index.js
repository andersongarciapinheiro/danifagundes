let slideIndex = 0;

function showSlides() {
  const notas = document.querySelector('.notas');
  const notasCards = document.querySelectorAll('.notas-cards');
  const totalSlides = notasCards.length - 1;

  if (slideIndex >= totalSlides) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = totalSlides - 1;
  }

  const translateValue = -slideIndex * 420 + 'px';
  notas.style.transform = 'translateX(' + translateValue + ')';
}

function nextSlide() {
  slideIndex++;
  showSlides();
}

function prevSlide() {
  slideIndex--;
  showSlides();
}

// // Automaticamente avança para o próximo slide a cada 3 segundos (opcional)
// setInterval(() => {
//   slideIndex++;
//   showSlides();
// }, 9000);

// Inicializa o carrossel
showSlides();
