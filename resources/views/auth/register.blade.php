<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jejak Desa Register</title>
    <link href="{{ asset('assets/img/logo2.png') }}" rel="icon">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4CAF50, #2E7D32); /* Hijau sesuai dengan tema */
        }

        .container {
            width: 70%;
            max-width: 1000px;
            background: #fff;
            display: flex;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Login Box */
        .login-box {
            display: flex;
            width: 100%;
            position: relative;
        }

        .login-box .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .login-box .logo img {
            width: 90px;
            height: auto;
        }

        /* Left Box */
        .left-box {
            flex: 2;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: #F1F8E9; /* Warna latar belakang hijau pucat */
        }

        .left-box h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2E7D32; /* Warna hijau tua */
        }

        .left-box p {
            color: #388E3C; /* Hijau yang lebih terang */
            margin: 10px 0;
        }

        .social-login {
            display: flex;
            gap: 10px;
            margin: 15px 0;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            color: white;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .social-btn.facebook {
            background: #3b5998;
        }

        .social-btn.google {
            background: #db4437;
        }

        .social-btn.linkedin {
            background: #0077b5;
        }

        form {
            width: 100%;
            margin-top: 10px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        form .btn {
            width: 100px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: #4CAF50; /* Hijau utama */
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        form .btn:hover {
            background: #388E3C; /* Hijau lebih tua */
        }

        /* Right Box */
        .right-box {
            flex: 1;
            padding: 50px;
            background: linear-gradient(135deg, #4CAF50, #2E7D32); /* Latar belakang hijau gradasi */
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right-box h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .right-box p {
            margin-bottom: 25px;
        }

        .signup-btn {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background: #fff;
            color: #4CAF50;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .signup-btn:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-box, .right-box {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <!-- Logo -->
            <div class="logo">
                <img src="assets/img/logo2.png" alt="Jejak Desa Logo">
            </div>
            <div class="left-box">
                <h2>Registrasi akunmu, yuk!</h2>
                <p>Daftar dengan akun sosmed</p>
                <div class="social-login">
                    <button class="social-btn facebook">f</button>
                    <button class="social-btn google">Go</button>
                    <button class="social-btn linkedin">in</button>
                </div>
                <p>ATAU</p>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                
                    <label for="nama_user"></label>
                    <input type="text" id="nama_user" name="nama_user" placeholder="Nama" value="{{ old('nama_user') }}" required>
                    @error('nama_user')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    <label for="username"></label>
                    <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    <label for="password"></label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    <label for="password_confirmation"></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                
                    <button type="submit" class="btn">Registrasi</button>
                </form>
                
            </div>
            <div class="right-box">
                <h2>Sudah punya akun?</h2>
                <p>Log In langsung saja, memudahkan anda!</p>
                <a href="{{ route('login') }}">
                    <button class="signup-btn">Log In</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
