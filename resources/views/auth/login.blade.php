@extends('layout.app')

@section('content')
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li>Login</li>
         </ul>
      </div>
   </nav>
   <center><div class="login-popup">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Login</a>
                </li>
                <li class="delimiter">or</li>
                <li class="nav-item">
                    <a class="border-no lh-1 ls-normal" href="/register">Register</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="signin">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="float-left"><span class="text-danger">*</span>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username or Email Address *">
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="float-left"><span class="text-danger">*</span>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password *">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input class="custom-checkbox" type="checkbox" name="remember" id="signin-remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-control-label" for="signin-remember">Remember
                                    me</label>
                            </div>
                            @if (Route::has('password.request'))
                                    <a class="lost-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                        </div>
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div></center>
</main>
@endsection
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        toggleCategory();
    });
</script>
