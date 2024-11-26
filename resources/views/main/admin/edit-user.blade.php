<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.admin.head')
   
    <link rel="stylesheet" href="/assets/css/user-manager.css">
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
    <h2 class="section-title-pm">User Management</h2>
    <div class="container-um">
        <h2 class="um-title2">User Management</h2>

        <!-- Add User Form -->
       
        <div class="form-container">
            <h3 class="um-title">Add New User</h3>
            {{-- <form id="addUserForm"> --}}
                <form  action="{{ route('admin.update_user',$user->id) }}" method="POST">
                    @csrf
                <input class="ip-um" type="text"  name="name" placeholder="Full Name" id="fullName" value="{{ $user->name }}">
                <input class="ip-um" type="email"  name="email" placeholder="Email" id="email" value="{{ $user->email }}">
                <input class="ip-um" type="tel"  name="phone" placeholder="Phone Number" id="phone" value="{{ $user->phone }}">
                <input class="ip-um" type="date"  name="dob" placeholder="Date of Birth" id="dob" value="{{ $user->dob }}">
                <select class="ip-um" id="gender" name="gender" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <input class="ip-um" type="text" name="address" placeholder="Address" id="address" value="{{ $user->address }}">
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter your password" >
                    <span class="toggle-icon" onclick="togglePassword(this)">
                      <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div>
                <button type="submit" class="btn-um add-btnum">Save</button>
            </div>
            </form>
            <a href="{{ route('admin.user_manager') }}" class="btn-um add-btnum">Cancel</a>
        </div>
       

        <!-- User List Table -->
        
    </div>

  
     
    <!-- End Main -->
    <!-- Footer -->
    @include('main.admin.footer')
    <script src="/assets/js/user-manager.js"></script>
    <script src="/assets/js/cart.js"></script>
</body>

</html>