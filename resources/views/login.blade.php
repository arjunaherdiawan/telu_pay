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
                        telkom: {
                            red: '#e30613',
                            maroon: '#9b1b30',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'scale(0.95) translateY(20px)' },
                            '100%': { opacity: '1', transform: 'scale(1) translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-outfit min-h-screen flex items-center justify-center bg-gray-50 bg-gradient-to-br from-white via-red-50 to-gray-200 overflow-hidden relative">
    
    <!-- Ambient Red Glows for "Eyecatching" effect -->
    <div class="absolute w-[600px] h-[600px] -top-64 -left-64 bg-red-100 rounded-full blur-[100px] opacity-60"></div>
    <div class="absolute w-[500px] h-[500px] bottom-0 right-0 bg-red-100 rounded-full blur-[100px] opacity-40"></div>

    <div class="container max-w-[420px] px-8 py-12 bg-white rounded-[40px] shadow-2xl shadow-red-100 border border-gray-100 relative z-10 animate-fade-in-up text-center">
        
        <!-- Logo -->
        <div class="mb-12 flex justify-center">
            <div class="w-16 h-16 bg-telkom-red flex items-center justify-center shadow-xl shadow-red-100 transform rotate-12 rounded-2xl">
                <i data-lucide="wallet" class="text-white w-8 h-8"></i>
            </div>
        </div>

        <h1 class="text-gray-900 text-4xl font-bold mb-2 tracking-tight">Welcome Back</h1>
        <p class="text-gray-500 mb-10 text-sm font-medium">Log in to your Telu-Pay account</p>

        <form action="#" class="space-y-6">
            <!-- Username -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none transition-colors group-focus-within:text-telkom-red text-gray-400">
                    <i data-lucide="user" class="w-5 h-5"></i>
                </div>
                <input type="text" name="username" placeholder="Username" 
                    class="w-full py-4.5 pl-14 pr-5 h-16 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
            </div>

            <!-- Password -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none transition-colors group-focus-within:text-telkom-red text-gray-400">
                    <i data-lucide="key-round" class="w-5 h-5"></i>
                </div>
                <input type="password" id="password" placeholder="Password" 
                    class="w-full py-4.5 pl-14 pr-12 h-16 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
                <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                    <i data-lucide="eye" id="togglePassword" class="text-gray-400 w-5 h-5 cursor-pointer hover:text-telkom-red transition-colors"></i>
                </div>
            </div>

            <div class="text-right">
                <a href="#" class="text-sm font-semibold text-telkom-red hover:text-telkom-maroon transition-colors">Forgot Password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit" 
                class="w-full py-5 bg-telkom-red text-white text-lg font-bold rounded-2xl shadow-xl shadow-red-100 hover:bg-telkom-maroon transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                Log In
            </button>
        </form>

        <p class="mt-10 text-gray-500 text-sm font-medium">
            Don't have an account? <a href="/register" class="text-telkom-red font-bold hover:underline">Create one</a>
        </p>
    </div>

    <script>
        lucide.createIcons();
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.setAttribute('data-lucide', type === 'password' ? 'eye' : 'eye-off');
            lucide.createIcons();
        });
    </script>
</body>
</html>
