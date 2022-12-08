@section('content')
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <!-- FLASH MESSAGE -->
        @if(session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger mt-4">
            {{ session()->get('error') }}
        </div>
        @endif
        <div class="forms-container">
            <div class="signin-signup">
                {{-- INI BUAT FORM REGISTER --}}
                <form method="POST" action="{{ route('mahasiswaRegister') }}" class="sign-up-form">
                    @csrf
                    <h2 class="title">R E G I S T E R</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" placeholder="username (NIM)" value="{{ old('nama') }}" autocomplete="nama"
                            autofocus>
                    </div>
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-building-columns"></i>
                        <input id="email" type="nim" class="form-control @error('nim') is-invalid @enderror" name="nim"
                            placeholder="example@mail.com" value="{{ old('nim') }}" autocomplete="nim" autofocus>
                    </div>
                    @error('nim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="password"
                            name="password" autocomplete="new-password" />
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password-confirm" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="password confirmation" name="password_confirmation"
                            autocomplete="new-password" />
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button class="btn" href="{{ __('Register') }}" type="submit">R E G I S T E R</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            {{-- <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <a href="">
                        <button class="btn transparent" id="sign-up-btn">
                            LOGIN
                        </button>
                    </a>
                </div>
                <img src="assets/img/logins.svg" class="image" alt="" />
            </div> --}}
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        L O G I N
                    </button>
                </div>
                <img src="assets/img/registration.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
