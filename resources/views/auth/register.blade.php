@extends('layout.app')

@section('content')
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li>Register</li>
         </ul>
      </div>
   </nav>
   <center><div class="login-popup">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                <li class="nav-item">
                    <a class="border-no lh-1 ls-normal" href="/login">Login</a>
                </li>
                <li class="delimiter">or</li>
                <li class="nav-item">
                    <a class="nav-link active border-no lh-1 ls-normal" href="/register">Register</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="signin">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                             <label class="float-left"><span class="text-danger">*</span>Name</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name"> 

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="float-left"><span class="text-danger">*</span>Email</label>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="float-left"><span class="text-danger">*</span>Phone Number</label>
                             <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="float-left"><span class="text-danger">*</span>{{ __('Password') }}</label>
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="float-left"><span class="text-danger">*</span>{{ __('Confirm Password') }}</label>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Register</button>
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
