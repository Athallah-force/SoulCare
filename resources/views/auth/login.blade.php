<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SoulCare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),
                        url('{{ asset('assets/backgroun_login.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(8px);
            z-index: -1;
            transform: scale(1.1);
        }
        
        .login-container {
            width: 100%;
            max-width: 500px;
            background: linear-gradient(135deg, rgba(167, 233, 175, 0.95) 0%, rgba(138, 180, 248, 0.95) 100%);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(30px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }
        
        .login-header {
            background-color: rgba(255, 255, 255, 0.25);
            padding: 40px 30px;
            text-align: center;
            color: #333;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .logo-container {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 15px;
            border: 3px solid rgba(255, 255, 255, 0.6);
        }
        
        .logo-img {
            width: 170%;
            height: 170%;
            object-fit: contain;
            border-radius: 50%;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }
        
        .login-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .login-header p {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 500;
        }
        
        .login-form {
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.92);
            margin: 25px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: #444;
            font-size: 15px;
        }
        
        .form-group input {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid rgba(225, 229, 233, 0.8);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .form-group input:focus {
            border-color: #8AB4F8;
            box-shadow: 0 0 0 4px rgba(138, 180, 248, 0.25), 
                        0 6px 20px rgba(138, 180, 248, 0.15);
            outline: none;
            background-color: white;
            transform: translateY(-2px);
        }
        
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 52px;
            cursor: pointer;
            color: #666;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .password-toggle:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .login-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #A7E9AF 0%, #8AB4F8 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 8px 25px rgba(138, 180, 248, 0.4);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }
        
        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(138, 180, 248, 0.5);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }
        
        .login-btn:hover::before {
            left: 100%;
        }
        
        .error-message {
            background-color: rgba(255, 234, 234, 0.9);
            color: #d32f2f;
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 16px;
            border-left: 5px solid #d32f2f;
            backdrop-filter: blur(5px);
        }
        
        .additional-links {
            text-align: center;
            margin-top: 25px;
            font-size: 16px;
        }
        
        .additional-links a {
            color: #8AB4F8;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            position: relative;
            padding: 2px 4px;
            border-radius: 4px;
        }
        
        .additional-links a:hover {
            color: #A7E9AF;
            text-decoration: none;
            background: rgba(138, 180, 248, 0.1);
            transform: translateY(-1px);
        }
        
        /* Efek partikel latar belakang */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 15px;
                background-attachment: scroll;
            }
            
            .login-container {
                max-width: 100%;
            }
            
            .login-form {
                padding: 30px;
                margin: 20px;
            }
            
            .login-header {
                padding: 30px 20px;
            }
            
            .logo-container {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Perusahaan" class="logo-img">
            </div>
            <h1>Selamat Datang</h1>
            <p>Silakan masuk ke akun Anda</p>
        </div>
        
        <form class="login-form" action="/login" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                <span class="password-toggle" onclick="togglePassword()">👁️</span>
            </div>
            
            <button type="submit" class="login-btn">Masuk</button>
            
            @if($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <div class="additional-links">
                <a href="#">Lupa password?</a> • <a href="{{ route('register') }}">Daftar akun baru</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
        
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.login-container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(30px) scale(0.95)';
            
            setTimeout(() => {
                container.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0) scale(1)';
            }, 200);
            
            // Buat partikel latar belakang
            createParticles();
        });

        // Fungsi untuk membuat partikel latar belakang
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 12;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 50 + 15;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const opacity = Math.random() * 0.3 + 0.1;
                const delay = Math.random() * 5;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.opacity = opacity;
                particle.style.animationDelay = `${delay}s`;
                particle.style.background = `radial-gradient(circle, 
                    rgba(167, 233, 175, ${opacity}) 0%, 
                    rgba(138, 180, 248, ${opacity}) 100%)`;
                
                particlesContainer.appendChild(particle);
            }
        }
    </script>
</body>
</html>