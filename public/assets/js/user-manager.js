const userTableBody = document.querySelector('#userTable tbody');
let users = [];

// Add new user
document.getElementById('addUserForm').addEventListener('submit', function (event) {
  event.preventDefault();

  const user = {
    fullName: document.getElementById('fullName').value,
    email: document.getElementById('email').value,
    password: document.getElementById('password').value,
    phone: document.getElementById('phone').value,
    dob: document.getElementById('dob').value,
    gender: document.getElementById('gender').value,
    address: document.getElementById('address').value,
  };

  users.push(user);
  addUserToTable(user);
  this.reset();
});

// Display user in table
function addUserToTable(user) {
  const row = document.createElement('tr');
  row.innerHTML = `
    <td>${user.fullName}</td>
    <td>${user.email}</td>
    <td>${user.phone}</td>
    <td>${user.dob}</td>
    <td>${user.gender}</td>
    <td>${user.address}</td>
    <td>
      <button class="btn-um edit-btnum" onclick="editUser(${users.indexOf(user)})">Edit</button>
      <button class="btn-um delete-btnum" onclick="deleteUser(${users.indexOf(user)})">Delete</button>
    </td>
  `;
  userTableBody.appendChild(row);
}

// Edit user
function editUser(index) {
  const user = users[index];
  document.getElementById('editFullName').value = user.fullName;
  document.getElementById('editEmail').value = user.email;
  document.getElementById('editPassword').value = user.password;
  document.getElementById('editPhone').value = user.phone;
  document.getElementById('editDob').value = user.dob;
  document.getElementById('editGender').value = user.gender;
  document.getElementById('editAddress').value = user.address;

  document.getElementById('profilePopup').classList.remove('hidden-um');

  document.getElementById('updateUserForm').onsubmit = function (e) {
    e.preventDefault();
    updateUser(index);
  };
}

// Update user info
function updateUser(index) {
  const user = users[index];
  user.fullName = document.getElementById('editFullName').value;
  user.email = document.getElementById('editEmail').value;
  user.password = document.getElementById('editPassword').value;
  user.phone = document.getElementById('editPhone').value;
  user.dob = document.getElementById('editDob').value;
  user.gender = document.getElementById('editGender').value;
  user.address = document.getElementById('editAddress').value;

  refreshUserTable();
  closePopup();
}

// Delete user
function deleteUser(index) {
  users.splice(index, 1);
  refreshUserTable();
}

// Refresh user table
function refreshUserTable() {
  userTableBody.innerHTML = '';
  users.forEach(addUserToTable);
}

// Close popup
function closePopup() {
  document.getElementById('profilePopup').classList.add('hidden-um');
}
