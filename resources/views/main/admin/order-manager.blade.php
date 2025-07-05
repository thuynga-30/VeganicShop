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
                        @include('main.navbar')
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
          <h3 class="s-title">Orders This Week</h3>
          <p >{{ $orderCount }}</p>
        </div>
        <div class="stat-box">
          <h3 class="s-title">Revenue This Week</h3>
          <p id="revenueToday">${{ number_format($totalRevenueToday, 2, '.', ',') }}</p>
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
              <th>Purchase Date</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample Order Row -->
            @foreach ($oders as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->gender }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->created_at->format('d/m/Y') }}</td>
              <td>${{ $item->totalPrice }}</td>
              <td>
                <a href="{{ route('order.detail',$item->id) }}" class="btn-um save-btnum">Detail</a>
                <form action="{{ route('admin.delete_order',$item->id) }}" method="POST" >
                  @csrf
                <button class="delete-button" onclick="confirmDeleteOrder()">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            <!-- Additional orders should go here -->
          </tbody>
        </table>
       
      </div>
      <div >
        {{ $oders->links() }}
          </div>
      </div>
    
  <!-- End Main -->
    <!-- Footer -->
    
    <!-- End Footer -->
    <!-- Bootstrap-->
    @include('main.admin.footer')

    <script src="/assets/js/order-manager.js"></script>
    <script src="/assets/js/cart.js"></script>

</body>

</html>