document.addEventListener('DOMContentLoaded', (event) => {
    const button = document.querySelector('[data-collapse-toggle="navbar-default"]');
    const navbar = document.getElementById('navbar-default');

    button.addEventListener('click', () => {
      navbar.classList.toggle('hidden');
      navbar.classList.toggle('block');
    });
  });

  // timeout pour les messages flash
  setTimeout(function() {
  let flashMessageElement = document.querySelector('.flash-message');
  if (flashMessageElement) {
      flashMessageElement.style.display = 'none';
  }
}, 5000);


    let form = document.querySelector('#form-checkpoint');
    form.addEventListener('submit', function(e) {
        form.reset();
    });
