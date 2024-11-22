// Hiển thị modal và điền dữ liệu sản phẩm cần chỉnh sửa
// Hiển thị modal và điền dữ liệu sản phẩm cần chỉnh sửa
document.querySelectorAll('.edit-btnpm').forEach(button => {
  button.addEventListener('click', (event) => {
    const row = event.target.closest('tr');
    const image = row.cells[0].querySelector('img').src; // Lấy đường dẫn ảnh
    const name = row.cells[1].innerText;
    const origin = row.cells[2].innerText;
    const price = row.cells[3].innerText.slice(1); // Loại bỏ ký hiệu $
    const weight = row.cells[4].innerText.split(' ')[0];
    const descBasic = row.cells[5].innerText;
    const descDetailed = row.cells[6].innerText;

    // Đặt giá trị vào modal
    // Lưu ý: Không thể đặt giá trị trực tiếp cho input type="file"
    document.getElementById('editName').value = name;
    document.getElementById('editOrigin').value = origin;
    document.getElementById('editPrice').value = price;
    document.getElementById('editWeight').value = quantity;
    document.getElementById('editDescBasic').value = descBasic;
    document.getElementById('editDescDetailed').value = descDetailed;

    // Hiển thị modal
    document.getElementById('editModal').classList.remove('hidden');
  });
});
function openEditPopup(button) {
  const product = JSON.parse(button.getAttribute('data-product'));

  // Điền thông tin vào form modal
  document.getElementById('editName').value = product.name;
  document.getElementById('editOrigin').value = product.origin;
  document.getElementById('editPrice').value = product.price;
  document.getElementById('editWeight').value = product.quantity;
  document.getElementById('editDescBasic').value = product.basic_des;
  document.getElementById('editDescDetailed').value = product.description;

  // Hiển thị modal
  document.getElementById('editModal').classList.remove('hidden');
}
// Đóng modal
function closeModal() {
  document.getElementById('editModal').classList.add('hidden');
}

// Xử lý sự kiện khi form chỉnh sửa được submit
document.getElementById('editForm').addEventListener('submit', (event) => {
  event.preventDefault();

  // Thực hiện cập nhật sản phẩm tại đây (tùy vào logic backend)
  // Ví dụ: Gửi dữ liệu qua API bằng fetch hoặc XMLHttpRequest

  // Đóng modal sau khi cập nhật xong
  closeModal();
});

