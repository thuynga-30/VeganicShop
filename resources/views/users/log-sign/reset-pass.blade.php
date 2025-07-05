
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('users.header')
    {{-- <title>Sign in & Sign up</title> --}}
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          @include('users.alert')
          <form action="{{ url('/check-reset/' . $token) }}"  method='POST'>
            <h2 class="title">Get A New Password</h2>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name='password' placeholder="Password" />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name='confirm_password' placeholder="Confirm Password" />
              </div>
            @csrf
            <button type="submit" class="btn">Reset Password</button>
          </form>
        </div>
      </div>
      <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Reset Your Password</h3>
          <p>
            Enter a new password to secure your account.
          </p>
          <a href="{{ route('login') }}"> <button class="btn transparent" id="sign-up-btn">
            Log In
          </button></a>
        </div>
        <img src="/template/img/reg2.svg" class="image" alt="" />
      </div>
        
      </div>
    </div>

    @include('users.footer')
    
  </body>
</html>
