<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login | Instaclone</title>
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link href={{ asset("css/style.css") }} rel="stylesheet" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body class="no-padding">
    <main class="login">
      <div class="login__column">
        <img
          src="images/phone.png"
          alt="Phone Image"
          title="Phone Image"
          class="login__phone-image"
        />
      </div>
      <section class="login__column">
        <div class="login__section login__sign-in">
          <img
            src="images/logo.png"
            alt="Logo"
            title="Logo"
            class="login__logo"
          />
          <!-- x   -->
          <form method="POST" action="{{ route('login') }}" class="login__form">
            @csrf

            <div class="login__input-container">
              <input
                type="email"
                id="email"
                name="email"
                placeholder="email"
                required
                class="login__input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                value="{{ old('email') }}" required autocomplete="email" autofocus />
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div>
            <div class="login__input-container">
              <input
                type="password"
                name="password" 
                id="password"
                placeholder="Password"
                class="login__input{{ $errors->has('password') ? ' is-invalid' : '' }}"
                required autocomplete="current-password"
              />
              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
          @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="login__form-link">  {{ __('Forgot Your Password?') }}</a>
              @endif
            </div>
            <div class="login__input-container">
              <button
                type="submit"
                value="Log in"
                class="login__input login__input--btn">
                {{ __('Login') }}
              </button>
            </div>
          </form>
          <span class="login__divider">or</span>
        </div>
        <div class="login__section login__sign-up">
          <span class="login__text">
            Don't have an account?
            <a href="{{ route('register') }}" class="login__link"> {{ __('Register') }}</a>
          </span>
        </div>
      
      </section>
    </main>
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"
    ></script>
    <script src={{ asset("js/app.js") }}></script>
  </body>
</html>
