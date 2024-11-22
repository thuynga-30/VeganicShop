<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.admin.head')

    <link rel="stylesheet" href="/assets/css/order-manager.css">
</head>

<body>
    <!-- Header -->
    <header class="headerprf">
        <div class="header__inner">
            <!-- Header top -->
            <div class="header__top">
                <div class="container">
                    <div class="header__top-inner">
                        <!-- Logo -->
                        <img src="/assets/img/logo4.png" alt="" class="logo">
                        <!-- Navbar -->
                        @include('main.admin.navbar')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Main -->
    <div class="container">
      <h2 class="section-title-pm">Order Management</h2>
      <!-- Statistic Boxes -->
      <div class="stat-container">
        <div class="stat-box">
          <h3 class="s-title">Orders Today</h3>
          <p id="ordersToday">0</p>
        </div>
        <div class="stat-box">
          <h3 class="s-title">Revenue Today</h3>
          <p id="revenueToday">$0.00</p>
        </div>
      </div>
  
      <!-- Orders Table -->
      <div class="order-table-container">
        <table class="order-table">
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample Order Row -->
            <tr>
              <td>John Doe</td>
              <td>Male</td>
              <td>john.doe@example.com</td>
              <td>+1234567890</td>
              <td>123 Street, City</td>
              <td><img src="path/to/product.jpg" alt="Product Image"></td>
              <td>Sample Product</td>
              <td>$50.00</td>
              <td>2</td>
              <td>$100.00</td>
              <td>
                <button class="delete-button" onclick="confirmDeleteOrder()">🗑️ Delete</button>
              </td>
            </tr>
            <!-- Additional orders should go here -->
          </tbody>
        </table>
      </div>
    </div>
  <!-- End Main -->
    <!-- Footer -->
    
    <!-- End Footer -->
    <!-- Bootstrap-->
    @include('main.admin.footer')

    <script src="/assets/js/order-manager.js"></script>
</body>

</html>