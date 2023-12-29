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
