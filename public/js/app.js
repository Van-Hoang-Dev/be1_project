// Modal
// Code Script of Login
const exampleModal = document.getElementById('exampleModal')
if (exampleModal) {
  exampleModal.addEventListener('show.bs.modal', event => {
    event.relatedTarget;
  })
}
// Code Script of Sign In
const signinModal = document.getElementById('signinModal');
if (signinModal) {
  signinModal.addEventListener('show.bs.modal', event => {
    event.relatedTarget;
  });
};

$(".related__products__slider").owlCarousel({
  loop: true,
  margin: 0,
  items: 4,
  dots: false,
  nav: true,
  navText: ["<span class='arrow_carrot-left'><span/>", "<span class='arrow_carrot-right'><span/>"],
  smartSpeed: 1200,
  autoHeight: false,
  autoplay: true,
  responsive: {
      0: {
          items: 1
      },
      480: {
          items: 2
      },
      768: {
          items: 3
      },
      992: {
          items: 4
      },
  }
});

