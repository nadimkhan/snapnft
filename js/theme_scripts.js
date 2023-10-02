document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.menu-item-has-children > a').forEach((parentMenuItem) => {
      parentMenuItem.addEventListener('click', (event) => {
        event.preventDefault();
  
        let dropdown = event.target.parentNode.querySelector('.submenu-dropdown');
        dropdown.classList.toggle('hidden');
  
        let icon = event.target.querySelector('svg');
        icon.classList.toggle('chevron-down');
        icon.classList.toggle('chevron-up');
      });
    });
  });
  