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
                <form  action="{{ route('admin.add_user') }}" method="POST">
                    @csrf
                <input class="ip-um" type="text"  name="name" placeholder="Full Name" id="fullName" required>
                <input class="ip-um" type="email"  name="email" placeholder="Email" id="email" required>
                <input class="ip-um" type="password"  name="password" placeholder="Password" id="password" required>
                <input class="ip-um" type="tel"  name="phone" placeholder="Phone Number" id="phone" required>
                <input class="ip-um" type="date"  name="dob" placeholder="Date of Birth" id="dob" required>
                <select class="ip-um" id="gender" name="gender" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <input class="ip-um" type="text" name="address" placeholder="Address" id="address" required>
                <button type="submit" class="btn-um add-btnum">Add User</button>
            </form>
        </div>
       

        <!-- User List Table -->
        <div class="user-list">
            <table class="um-table" id="userTable">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <!-- User rows will be added here dynamically -->
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <a href="{{ route('admin.edit_user',$user->id) }}" class="btn-um add-btnum">Edit</a>
                            <form action="{{ route('admin.delete_user',$user->id) }}" method="POST" onclick="return confirm('Are you sure want to delete?')">
                                @csrf
                                <button type="submit" class="btn-um delete-btnum">Delete</button>
                            </form>
                            
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

  
     
    <!-- End Main -->
    <!-- Footer -->
    @include('main.admin.footer')
    <script src="/assets/js/user-manager.js"></script>
    <script src="/assets/js/cart.js"></script>
</body>

</html>