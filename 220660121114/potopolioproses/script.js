// Select elements
const burger = document.querySelector('.burger');
const nav = document.querySelector('nav ul');

// Add click event listener to the burger menu
burger.addEventListener('click', () => {
    // Toggle active class on the navigation menu
    nav.classList.toggle('active');
    
    // Add animation to the burger lines
    burger.classList.toggle('toggle');
});
