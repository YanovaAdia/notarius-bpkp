<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Aktivitas Harian</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/logobpkp.png" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="login-container">
        <!-- Bagian Kiri -->
        <div class="login-left">
            <h2>Log In</h2>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>Error: {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="nip">NIP</label>
                <input type="text" id="nip" name="nip" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>

        <!-- Bagian Kanan -->
        <div class="login-right">
            <img src="assets/images/logos/logobpkp.png" alt="Logo Perusahaan" class="logo">
            <h3>Welcome to</h3>
            <h1>Employee Daily Activity</h1>
            <img src="assets/images/login/image.png" alt="Ilustrasi" class="illustration">
        </div>
    </div>
</body>

</html>
