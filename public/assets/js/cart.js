// Lắng nghe sự kiện khi nhấn vào nút toggle
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.navbar__toggle');
    const navbarList = document.querySelector('.navbar__list');

    toggle.addEventListener('click', () => {
        navbarList.classList.toggle('show');
    });
});
