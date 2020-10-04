let element = document.getElementById('mobileToggler');

if (element !== null) {
    element.addEventListener('click', toggleMenu);
}

function toggleMenu() {
    let nav = document.getElementById('navbar-menu-container');
    if (nav.classList.contains('hidden')) {
        nav.classList.remove('hidden');
    } else {
        nav.classList.add('hidden');
    }
}
