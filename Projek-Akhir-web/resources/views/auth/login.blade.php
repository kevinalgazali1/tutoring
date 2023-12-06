<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
        }

        .container {
            padding-top: 60px;
        }

        .card-login {
            box-shadow: -3px -7px 31px 13px rgba(168, 0, 0, 0.07);
            width: 100%;
            background: #EBE3D5;
            padding: 1em;
            border-radius: 30px;
            height: 100%;
        }

        .card-header {
            text-align: center;
            font-size: 29px;
            border-bottom: 1px solid #4D4C7D;
            padding: 0.2em;
            color: #4D4C7D;
        }

        .card-body {
            margin-top: 1em;
            padding: 1em;
        }

        .form-login {
            width: 100%;
        }

        .form-input {
            padding: 6px;
            border-radius: 8px;
            border: 1px solid #4D4C7D;
            margin-bottom: 1em;
        }

        .form-check-label {
            margin-left: 0.2em;
        }

        .btn-login {
            width: 100%;
            max-width: 250px;
            background-color: #BBAB8C;
            border: none;
            padding: 0.8em 1.5em;
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
        }

        .btn-login:hover {
            background-color: #837862; /* Warna latar belakang saat tombol dihover */
        }

        .btn-forgot,
        .btn-dont {
            text-decoration: none;
            color: #6c757d;
        }
        .btn-dont:hover {
            color: #005bab;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="card-login">
            <div class="col-1">
                <p class="text-center mt-3">
                    <a href="/" class="text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" style="fill: rgb(58, 26, 26);">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                    </a>
                </p>
            </div>
            <div class="card-header">LOGIN</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="form-login">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <button type="submit" class="btn btn-login">{{ __('Login') }}</button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link btn-forgot" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    @endif

                    <div class="mt-3 text-center">
                        Don't have an account? <a href="{{ route('register') }}" class="btn-dont">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
