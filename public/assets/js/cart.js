// Lắng nghe sự kiện khi nhấn vào nút toggle
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.navbar__toggle');
    const navbarList = document.querySelector('.navbar__list');

    toggle.addEventListener('click', () => {
        navbarList.classList.toggle('show');
    });
});
function showTab(tabId) {
    // Hide all tabs
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.classList.remove('active'));

    // Remove active state from all buttons
    const buttons = document.querySelectorAll('.product-detail__info-actions ');
    buttons.forEach(button => button.classList.remove('product-detail__info-action--active'));

    // Show selected tab and activate the corresponding button
    document.getElementById(tabId).classList.add('active');
    event.target.classList.add('product-detail__info-action--active');
}


