// Optional animation or effect
document.addEventListener("DOMContentLoaded", () => {
    const box = document.querySelector('.admin-login-box');
    box.style.transform = 'scale(1)';
});


//Dashboard JS
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.style.opacity = '0';
        setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease-in';
            card.style.opacity = '1';
        }, 200);
    });
});


//add_project JS
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.form-container');
    form.style.opacity = 0;
    setTimeout(() => {
        form.style.transition = 'opacity 0.6s ease-in-out';
        form.style.opacity = 1;
    }, 100);
});
