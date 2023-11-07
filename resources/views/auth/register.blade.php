@extends('layouts.main')
@section('title', 'Registro')
@section('main')
    <section class="register">
        <h1>Registro</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('auth.registerAction') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            @if ($errors->has('email')) aria-describedby="error-email" @endif>
                        @error('email')
                            <div class="alert alert-danger d-flex align-items-center" role="alert" id="error-email">
                                {{ $errors->first('email') }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label password">Contraseña</label>
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
                    <div class="mb-4">
                        <label for="nombre">Tu nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <input type="hidden" name="roles_id" value="2">
                    <div class="mb-4">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control">
                    </div>
            </div>

            <div class="col-md-6">
                <div class="mb-4">
                    <label for="biografia">Cuéntanos un poco sobre vos</label>
                    <textarea name="biografia" id="biografia" class="form-control"></textarea>
                </div>
                <div class="mb-4">
                    <label for="img">Elige tu foto de perfil</label>
                    <input type="file" name="img" id="img" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="botones">
                    <button type="submit" class="btn">Registrarse</button>
                </div>
            </div>
            </form>
        </div>
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
