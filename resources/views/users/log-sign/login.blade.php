
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
          <form action="/users/log-sign/login/store" class="sign-in-form" method="POST">
            <h2 class="title">Log in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name='email' placeholder="Email" />

            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name='password' placeholder="Password" />
            </div>
            <div>
              <a href="{{ route('forgot') }}"> Forgot Password</a>
            </div>
            @csrf
          <button type="submit" class="btn solid">Log In</button>
            <p class="social-text">Or Sign in with social platforms</p>
          
          </form>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa-brands fa-google"></i>
              </a>
            </div>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a href="{{ route('signup') }}"> <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button></a>
           
          </div>
          <img src="/template/img/reg.svg" class="image" alt="" />
        </div>
        
      </div>
    </div>

    @include('users.footer')
  </body>
</html>
