const mediaQuery = window.matchMedia("(max-width: 415px)");

if (mediaQuery.matches) {
    const rowAboutContainer = document.querySelector(".performance__our .row");
    const items = document.querySelectorAll(".performance__our .col-lg-4.col-12"); 
    let currentIndex = 0;
    function scrollItems(index) {
        const itemWidth = items[0].offsetWidth;
        const scrollPosition = itemWidth * index;
        rowAboutContainer.scrollTo({
            left: scrollPosition,
            behavior: "smooth",
        });
    }

    function autoScroll() {
        currentIndex = (currentIndex + 1) % items.length;
        scrollItems(currentIndex);
    }

    setInterval(autoScroll, 5000);
}
// Lắng nghe sự kiện khi nhấn vào nút toggle
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.navbar__toggle');
    const navbarList = document.querySelector('.navbar__list');

    toggle.addEventListener('click', () => {
        navbarList.classList.toggle('show');
    });
});