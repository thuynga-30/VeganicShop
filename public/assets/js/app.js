const imgWrap = document.querySelector('.media-section__img-wrap');
const images = document.querySelectorAll('.media-section__img');
const imgCount = images.length;

for (let i = 0; i < imgCount; i++) {
    const clone = images[i].cloneNode(true);
    imgWrap.appendChild(clone);
}

imgWrap.style.width = `${imgWrap.scrollWidth}px`;
const mediaQuery = window.matchMedia("(max-width: 415px)");

if (mediaQuery.matches) {
    const productList = document.querySelector(".our-product__list .row");
    const productItems = productList.querySelectorAll(".our-product__list .row .col-12");
    let productIndex = 0;

    const commentBox = document.querySelector(".comment__list-box .row");
    const commentItems = commentBox.children;
    let commentIndex = 0;

    function scrollProducts(index) {
        const itemWidth = productItems[0].offsetWidth;
        const scrollPosition = itemWidth * index;
        productList.scrollTo({
            left: scrollPosition,
            behavior: "smooth",
        });
    }

    function scrollComments(index) {
        const itemWidth = commentItems[0].offsetWidth;
        commentBox.style.transform = `translateX(-${index * itemWidth}px)`;
        commentBox.style.transition = "transform 0.5s ease-in-out";
    }

    function autoScroll() {
        productIndex = (productIndex + 1) % productItems.length;
        scrollProducts(productIndex);

        commentIndex = (commentIndex + 1) % commentItems.length;
        scrollComments(commentIndex);
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

