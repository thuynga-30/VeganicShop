// Chuyển chế độ sang chỉnh sửa
function enableEditing() {
  document.querySelectorAll('input, select, textarea').forEach(field => {
    field.removeAttribute('readonly');
    field.disabled = false;
  });

  // Hiện nút Save và Cancel, ẩn nút Edit
  document.querySelector('.edit-btnprf').classList.add('hiddenprf');
  document.querySelector('.save-btnprf').classList.remove('hiddenprf');
  document.querySelector('.cancel-btnprf').classList.remove('hiddenprf');
}

// Hủy chỉnh sửa, quay về trạng thái đọc
function cancelEditing() {
  document.querySelectorAll('input, select, textarea').forEach(field => {
    field.setAttribute('readonly', true);
    field.disabled = true;
  });
  // 'infor, sel, tar'

  document.querySelector('.edit-btnprf').classList.remove('hiddenprf');
  document.querySelector('.save-btnprf').classList.add('hiddenprf');
  document.querySelector('.cancel-btnprf').classList.add('hiddenprf');
}

// Toggle hiển thị mật khẩu
function togglePassword() {
  const passwordField = document.getElementById('password');
  if (passwordField.type === 'password') {
    passwordField.type = 'text';
  } else {
    passwordField.type = 'password';
  }
}

// Xử lý lưu thông tin
document.getElementById('profileForm').addEventListener('submit', function(event) {
  event.preventDefault();

  // Thực hiện lưu thông tin (giả sử lưu qua API hoặc backend)
  alert("Profile saved successfully!");

  cancelEditing();
});
