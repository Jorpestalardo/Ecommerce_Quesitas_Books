@extends('layouts.main')
@section('title', 'Iniciar Sesión')
@section('main')
    <section class="login">

        <h1>Iniciar Sesión</h1>


        @if (session('message.error'))
            <div class="alert alert-danger">
                {{ session('message.error') }}
            </div>
        @endif

        <form action="{{ route('auth.loginAction') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="form-label"> Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                    @if ($errors->has('email')) aria-describedby="error-email" @endif>
                @error('email')
                    <div class="alert alert-danger d-flex align-items-center" role="alert" id="error-email">
                        {{ $errors->first('email') }}</div>
                @enderror
            </div>
            <div>
                <label for="password" class="form-label password"> Contraseña</label>
                <div class="password-field">
                    <input type="password" name="password" id="password" class="form-control"
                        @if ($errors->has('password')) aria-describedby="error-password" @endif>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">
                        <ion-icon name="eye"></ion-icon>
                    </span>
                </div>
                @error('password')
                    <div class="alert alert-danger d-flex align-items-center" role="alert" id="error-password">
                        {{ $errors->first('password') }}</div>
                @enderror
            </div>

            <div class="botones">
                <button type="submit" class="btn">Iniciar Sesión</button>
                <a class="btn btn-secondary ms-5" href="{{ route('auth.register') }}">No tengo cuenta</a>
            </div>
        </form>
    </section>

    <script>
        const togglePasswordVisibility = () => {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password ion-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.name = 'eye-off';
            } else {
                passwordInput.type = 'password';
                toggleIcon.name = 'eye';
            }
        };
    </script>
@endsection
