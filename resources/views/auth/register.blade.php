<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SoulCare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),
                        url('{{ asset('assets/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow: hidden;
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
        
        .register-container {
            width: 100%;
            max-width: 500px;
            background: linear-gradient(135deg, rgba(167, 233, 175, 0.95) 0%, rgba(138, 180, 248, 0.95) 100%);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            position: relative;
            transition: all 0.3s ease;

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
        
        .register-header {
            background-color: rgba(255, 255, 255, 0.25);
            padding: 40px 30px;
            text-align: center;
            color: #333;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            z-index: 2;
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
            transform: translateZ(20px);
            transition: transform 0.3s ease;
        }
        
        .logo-container:hover {
            transform: translateZ(30px) scale(1.05);
        }
        
        .logo-img {
            width: 170%;
            height: 170%;
            object-fit: contain;
            border-radius: 50%;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }
        
        .register-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateZ(15px);
        }
        
        .register-header p {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 500;
            transform: translateZ(10px);
        }
        
        .register-form {
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.92);
            margin: 25px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            position: relative;
            z-index: 2;
            transform-style: preserve-3d;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
            transform-style: preserve-3d;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: #444;
            font-size: 15px;
            transform: translateZ(10px);
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid rgba(225, 229, 233, 0.8);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            transform: translateZ(0);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 16px;
            background-color: rgba(255, 255, 255, 0.95);
        }
        
        .form-group input:focus,
        .form-group select:focus {
            border-color: #8AB4F8;
            box-shadow: 0 0 0 4px rgba(138, 180, 248, 0.25), 
                        0 6px 20px rgba(138, 180, 248, 0.15);
            outline: none;
            background-color: white;
            transform: translateZ(5px) translateY(-2px);
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
            transform: translateZ(5px);
        }
        
        .password-toggle:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateZ(10px) scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .register-btn {
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
            transform: translateZ(10px);
            letter-spacing: 0.5px;
        }
        
        .register-btn:hover {
            transform: translateZ(15px) translateY(-3px);
            box-shadow: 0 15px 35px rgba(138, 180, 248, 0.5);
        }
        
        .register-btn:active {
            transform: translateZ(5px) translateY(0);
        }
        
        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }
        
        .register-btn:hover::before {
            left: 100%;
        }
        
        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 16px;
            transform: translateZ(5px);
        }
        
        .login-link a {
            color: #8AB4F8;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            position: relative;
            padding: 2px 4px;
            border-radius: 4px;
        }
        
        .login-link a:hover {
            color: #A7E9AF;
            text-decoration: none;
            background: rgba(138, 180, 248, 0.1);
            transform: translateY(-1px);
        }
        
        .form-row {
            display: flex;
            gap: 15px;
            transform-style: preserve-3d;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        @media (max-width: 480px) {
            body {
                padding: 15px;
                background-attachment: scroll;
            }
            
            .register-container {
                max-width: 100%;
                transform: none !important;
            }
            
            .register-form {
                padding: 30px;
                margin: 20px;
            }
            
            .register-header {
                padding: 30px 20px;
            }
            
            .logo-container {
                width: 100px;
                height: 100px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            /* Nonaktifkan efek parallax di mobile */
            .parallax-enabled {
                transform: none !important;
            }
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
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="register-container" id="registerContainer">
        <div class="register-header">
            <div class="logo-container">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Perusahaan" class="logo-img">
            </div>
            <h1>Buat Akun Baru</h1>
            <p>Bergabunglah untuk pelayanan terbaik</p>
        </div>
        
        <form class="register-form" action="/register" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan nomor telepon">
                </div>
            </div>
            
            <div class="form-group">
                <label for="tipe_pengguna">Tipe Pengguna</label>
                <select id="tipe_pengguna" name="tipe_pengguna" required>
                    <option value="">Pilih tipe pengguna</option>
                    <option value="Client">Klien</option>
                    <option value="Professional">Profesional</option>
                    <option value="Admin">Admin</option>
                    
                </select>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    <span class="password-toggle" onclick="togglePassword('password')">👁️</span>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                    <span class="password-toggle" onclick="togglePassword('password_confirmation')">👁️</span>
                </div>
            </div>
            
            <button type="submit" class="register-btn">Daftar Sekarang</button>
            
            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcons = document.querySelectorAll('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcons.forEach(icon => {
                    if (icon.parentElement.querySelector('input').type === 'text') {
                        icon.textContent = '🙈';
                    }
                });
            } else {
                passwordInput.type = 'password';
                toggleIcons.forEach(icon => {
                    if (icon.parentElement.querySelector('input').type === 'password') {
                        icon.textContent = '👁️';
                    }
                });
            }
        }
        
        // Validasi konfirmasi password
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            
            function validatePassword() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.style.borderColor = '#ff6b6b';
                    confirmPassword.style.boxShadow = '0 0 0 4px rgba(255, 107, 107, 0.2)';
                } else {
                    confirmPassword.style.borderColor = '#A7E9AF';
                    confirmPassword.style.boxShadow = '0 0 0 4px rgba(167, 233, 175, 0.2)';
                }
            }
            
            password.addEventListener('input', validatePassword);
            confirmPassword.addEventListener('input', validatePassword);
            
            // Animasi saat halaman dimuat
            const container = document.querySelector('.register-container');
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
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 60 + 20;
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