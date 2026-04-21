<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telu-Pay - Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Outift -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            purple: '#6c5ce7',
                            dark: '#4a34a8',
                            light: '#745ae3',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'blob-slow': 'blobSlow 10s infinite alternate',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'scale(0.95) translateY(20px)' },
                            '100%': { opacity: '1', transform: 'scale(1) translateY(0)' },
                        },
                        blobSlow: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '100%': { transform: 'translate(20px, -20px) scale(1.05)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .pentagon {
            clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
        }
        .blob-shape-1 {
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }
        .blob-shape-2 {
            border-radius: 60% 40% 30% 70% / 50% 30% 70% 50%;
        }
    </style>
</head>
<body class="font-outfit min-h-screen flex items-center justify-center bg-brand-dark bg-gradient-to-b from-[#6a4fe3] to-[#4a34a8] overflow-hidden relative">
    
    <!-- Ambient Blobs -->
    <div class="blob-shape-1 absolute w-[600px] h-[600px] -top-[150px] -left-[200px] bg-[#5e42a6]/60 blur-[60px] z-1 animate-blob-slow"></div>
    <div class="blob-shape-2 absolute w-[700px] h-[700px] -bottom-[200px] -right-[250px] bg-[#7b61ff]/20 blur-[60px] z-1 animate-blob-slow"></div>

    <div class="container max-w-[400px] px-8 py-10 relative z-10 text-center animate-fade-in-up">
        <!-- Logo -->
        <div class="flex justify-end mb-12 pr-2">
            <div class="pentagon w-12 h-12 bg-white flex items-center justify-center shadow-lg transform hover:rotate-12 transition-transform duration-300">
                <span class="text-brand-light font-bold text-2xl">T</span>
            </div>
        </div>

        <h1 class="text-white text-[42px] font-bold mb-14 tracking-tight leading-tight">Telu-Pay</h1>

        <form action="#" class="space-y-5">
            <!-- Email -->
            <div class="relative group">
                <i data-lucide="mail" class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5 transition-colors group-focus-within:text-brand-purple"></i>
                <input type="email" placeholder="E-mail address" 
                    class="w-full py-5 pl-14 pr-5 rounded-[20px] bg-white border-2 border-transparent outline-none shadow-md focus:border-brand-purple/30 focus:-translate-y-0.5 transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
            </div>

            <!-- Password -->
            <div class="relative group">
                <i data-lucide="key-round" class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5 transition-colors group-focus-within:text-brand-purple"></i>
                <input type="password" id="password" placeholder="Password" 
                    class="w-full py-5 pl-14 pr-12 rounded-[20px] bg-white border-2 border-transparent outline-none shadow-md focus:border-brand-purple/30 focus:-translate-y-0.5 transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
                <i data-lucide="eye" id="togglePassword" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5 cursor-pointer hover:text-brand-purple transition-colors"></i>
            </div>

            <!-- Login Button -->
            <button type="submit" 
                class="w-full py-5 mt-6 rounded-[20px] bg-[#5f4ede] text-white text-lg font-bold shadow-[0_20px_40px_rgba(95,78,222,0.4)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-400 capitalize">
                Login
            </button>
        </form>

        <a href="#" class="inline-block mt-8 text-white/80 text-sm border-b border-white/30 pb-0.5 hover:border-white transition-colors">
            Forgot password?
        </a>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Password visibility toggle logic
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            const iconName = type === 'password' ? 'eye' : 'eye-off';
            this.setAttribute('data-lucide', iconName);
            lucide.createIcons();
        });
    </script>
</body>
</html>
