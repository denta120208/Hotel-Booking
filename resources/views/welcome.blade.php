<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxStay - Aplikasi Booking Hotel</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
        }
        
        .landing-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 600px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(50px);
            opacity: 0;
            animation: fadeIn 1s forwards;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .header {
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
        .logo-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .logo {
            height: 80px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        h1 {
            color: #1a365d;
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        }
        
        .tagline {
            color: #4a5568;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .content {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 0 30px 30px;
            align-items: center;
        }
        
        .featured-image {
            width: 100%;
            height: 250px;
            border-radius: 15px;
            object-fit: cover;
            margin-bottom: 40px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            width: 100%;
            max-width: 800px;
        }
        
        .btn {
            padding: 18px 38px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 220px;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #4299e1, #3182ce);
            color: white;
            border: none;
            box-shadow: 0 10px 15px -3px rgba(66, 153, 225, 0.4);
        }
        
        .btn-secondary {
            background: white;
            color: #3182ce;
            border: 2px solid #3182ce;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 20px -3px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary:hover {
            background: linear-gradient(45deg, #3182ce, #2c5282);
        }
        
        .btn-secondary:hover {
            background: rgba(49, 130, 206, 0.1);
        }
        
        .btn i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: scale(0);
            animation: rippleEffect 0.8s linear;
        }
        
        @keyframes rippleEffect {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            overflow: hidden;
        }
        
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }
        
        .footer {
            padding: 20px;
            text-align: center;
            color: #4a5568;
            font-size: 0.9rem;
            margin-top: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .featured-image {
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="landing-card">
            <div class="header">
                <div class="logo-container">
                    <img src="/image/rooms/logo.jpeg" alt="Hotel Logo" class="logo" onerror="this.src='/image/rooms/logo.jpeg'; this.style.opacity=0.7;">
                </div>
                <h1>LuxStay</h1>
                <p class="tagline">Nikmati pengalaman menginap premium dengan layanan booking hotel terbaik</p>
            </div>
            
            <div class="content">
                <div class="buttons">
                    <a href="/admin" class="btn btn-primary" onclick="addRippleEffect(event)">
                        <i>👑</i> Login sebagai Admin
                    </a>
                    <a href="/home" class="btn btn-secondary" onclick="addRippleEffect(event)">
                        <i>👤</i> Masuk sebagai User
                    </a>
                </div>
            </div>
            
            <div class="footer">
                <p>© 2025 LuxStay - Aplikasi Booking Hotel Premium</p>
            </div>
        </div>
    </div>
    
    <div class="floating-elements">
        <div class="floating-element" style="width: 60px; height: 60px; top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="floating-element" style="width: 40px; height: 40px; top: 20%; right: 15%; animation-delay: 1s;"></div>
        <div class="floating-element" style="width: 25px; height: 25px; bottom: 30%; left: 20%; animation-delay: 2s;"></div>
        <div class="floating-element" style="width: 35px; height: 35px; bottom: 10%; right: 10%; animation-delay: 3s;"></div>
    </div>
    
    <script>
        // Ripple effect for buttons
        function addRippleEffect(event) {
            const button = event.currentTarget;
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (event.clientX - rect.left - size/2) + 'px';
            ripple.style.top = (event.clientY - rect.top - size/2) + 'px';
            
            button.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 800);
        }
        
        // Staggered animations
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach((btn, index) => {
                btn.style.opacity = 0;
                btn.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    btn.style.transition = 'all 0.6s ease';
                    btn.style.opacity = 1;
                    btn.style.transform = 'translateY(0)';
                }, 800 + (index * 200));
            });
            
            // Create random floating elements
            const floatingContainer = document.querySelector('.floating-elements');
            for (let i = 0; i < 10; i++) {
                const element = document.createElement('div');
                element.className = 'floating-element';
                const size = Math.random() * 20 + 10;
                element.style.width = size + 'px';
                element.style.height = size + 'px';
                element.style.top = Math.random() * 100 + '%';
                element.style.left = Math.random() * 100 + '%';
                element.style.animationDelay = Math.random() * 5 + 's';
                element.style.animationDuration = (Math.random() * 6 + 6) + 's';
                floatingContainer.appendChild(element);
            }
        });
    </script>
</body>
</html>