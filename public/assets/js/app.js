const imgWrap = document.querySelector('.media-section__img-wrap');
const images = document.querySelectorAll('.media-section__img');
const imgCount = images.length;

// Nhân đôi nội dung để tạo hiệu ứng cuộn vô hạn
for (let i = 0; i < imgCount; i++) {
    const clone = images[i].cloneNode(true);
    imgWrap.appendChild(clone);
}

// Cập nhật chiều rộng của imgWrap
imgWrap.style.width = `${imgWrap.scrollWidth}px`;

function toggleDropdown() {
    // Lấy phần tử menu dropdown
    const dropdown = document.getElementById("dropdownMenu");

    // Thêm hoặc xóa class "show" để hiển thị/ẩn menu
    if (dropdown.classList.contains("show")) {
        dropdown.classList.remove("show"); // Ẩn menu
    } else {
        dropdown.classList.add("show"); // Hiển thị menu
    }
}

// Đóng menu dropdown khi nhấp bên ngoài
window.onclick = function (event) {
    // Nếu không nhấp vào nút dropdown
    if (!event.target.matches('.dropdown-btn')) {
        const dropdown = document.getElementById("dropdownMenu");
        dropdown.classList.remove("show"); // Đóng menu
    }
};