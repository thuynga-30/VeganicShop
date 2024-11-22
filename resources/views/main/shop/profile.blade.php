<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
    <link rel="stylesheet" href="/assets/css/userprofile.css">
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
                       @include('main.shop.navbar')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Main -->
    <h2 class="section-title-pm">User Management</h2>
    <div class="containerprf">
        {{-- <h2 id="prlnameid" class="prlname">User Profile</h2>  --}}
        <form  action="{{ route('updateProfile') }}" method="post">
            @csrf
            <div class="form-groupprf">
                <label class="lb-prf" for="fullName">Full Name</label>
                <input class="infor" type="text" id="fullName" name="name" value="{{ $user->name }}" readonly>
            </div>

            <div class="form-groupprf">
                <label class="lb-prf" for="email">Email</label>
                <input class="infor" type="email" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>

            <div class="form-groupprf">
                <label class="lb-prf" for="phone">Phone Number</label>
                <input class="infor" type="tel" id="phone" name="phone" value="{{ $user->phone }}" readonly>
            </div>

            <div class="form-groupprf">
                <label class="lb-prf" for="dob">Date of Birth</label>
                <input class="infor" type="date" id="dob" name="dob" value="{{ $user->dob }}" readonly>
            </div>

            <div class="form-groupprf">
                <label class="lb-prf" for="gender">Gender</label>
                <select class="infor sel" id="gender" name="gender" disabled>
                    <option value="male" {{$user->gender =='male' ? 'selected': '' }}>Male</option>
                    <option value="female"{{$user->gender =='female' ? 'selected': '' }}>Female</option>
                    {{-- <option value="other">Other</option> --}}
                </select>
            </div>

            <div class="form-groupprf">
                <label class="lb-prf" for="address">Address</label>
                <textarea class="infor inp tar" id="address" name="address" readonly>{{ $user->address }}</textarea>
            </div>
            {{-- <div class="form-groupprf">
                <label class="lb-prf" for="password">Password</label>
                <input class="infor" type="password" id="password" name="password" placeholder="Your Password">
                <button type="button" class="btnprf" onclick="togglePassword()">Show</button>
                @error('password')
                    <div class="help-block">{{ $message }}</div>
                @enderror
            </div>  --}}
            <button type="submit" class="btnprf save-btnprf hiddenprf">Save Changes</button>

        </form>
            <div class="form-actionsprf">
                <button type="button" class="btnprf edit-btnprf" onclick="enableEditing()">Edit Profile</button>
                <button type="button" class="btnprf cancel-abtnprf hiddenprf" onclick="cancelEditing()">Cancel</button>
            </div>
        
    </div>
    <!-- End Main -->
    <!-- Footer -->
   
    <!-- End Footer -->
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- JS -->
    @include('main.footer')
    <script src="/assets/js/userprofile.js"></script>
</body>

</html>