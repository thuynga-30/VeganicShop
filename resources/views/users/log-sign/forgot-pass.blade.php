
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
          <form action="/check-forgot" class="sign-up-form" method='POST'>
            <h2 class="title">Forgot Password</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name='email' placeholder="Email" />
            </div>

            @csrf
            <button type="submit" class="btn">Send email</button>
            
          
          </form>
          
         
           
        </div>
      </div>
      <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Forgot Your Password?</h3>
          <p>
            Don’t worry! Just enter your email address, and we’ll send you a link to reset your password.
          </p>
          <a href="{{ route('login') }}"> <button class="btn transparent" id="sign-up-btn">
            Log In
          </button></a>
          <a href="{{ route('index') }}"><button class="btn transparent"><i class="fa-solid fa-house"></i></button></a>

        </div>
        <img src="/template/img/reg2.svg" class="image" alt="" />
      </div>
        
      </div>
    </div>

    @include('users.footer')
    
  </body>
</html>
