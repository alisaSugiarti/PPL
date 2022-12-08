@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Log in & Register</title>
</head>

<body>
    <div class="container">

        <div class="forms-container">
            <div class="signin-signup">
                {{-- INI BUAT FORM LOGIN --}}
                <form method="POST" action="{{ route('mahasiswaLogin') }}" class="sign-in-form">
                    @csrf
                    <h2 class=" title">L O G I N</h2>
                    <!-- FLASH MESSAGE -->
                    @if(session()->has('success'))
                    <div class="alert alert-success mt-4" style="color: green">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    @if(session()->has('error'))
                    <div class="alert alert-danger mt-4" style="color: red">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="username" type="text" class="form-control" name="username"
                            placeholder="username (nim)" autofocus>
                    </div>
                    @error('username')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" class="form-control " placeholder="password"
                            name="password" autocomplete="current-password" />
                    </div>
                    @error('password')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <button class="btn solid" type="submit" name="submit">L O G I N</button>
                </form>

                {{-- INI BUAT FORM REGISTER --}}
                <form method="POST" action="{{ route('mahasiswaRegister') }}" class="sign-up-form">
                    @csrf
                    <h2 class="title">R E G I S T E R</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" placeholder="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>
                    </div>
                    @error('nama')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input id="nim" type="nim" class="form-control @error('nim') is-invalid @enderror" name="nim"
                            placeholder="username (NIM)" value="{{ old('nim') }}" autocomplete="nim" autofocus>
                    </div>
                    @error('nim')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="password"
                            name="password" autocomplete="new-password" />
                    </div>
                    @error('password')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password-confirm" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="password confirmation" name="password_confirmation"
                            autocomplete="new-password" />
                    </div>
                    @error('password')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <button class="btn" href="{{ __('Register') }}" type="submit">R E G I S T E R</button>
                </form>
                <a href="{{ route('viewAdminLogin') }}" style="text-align: center; color:gray;">Go to Admin</a>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Welcome to Si Perpus UTM</h3>
                    <p>
                        Silahkan login untuk masuk kedalam halaman siperpus
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        R e g i s t e r
                    </button>
                </div>
                <img src="{{ asset('img/logins.svg') }}" class="image" alt="" />
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah buat akun?</h3>
                    <p>
                        Silahkan register untuk membuat akun perpustakaan anda
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        L O G I N
                    </button>
                </div>
                <img src="{{ asset('img/registration.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
