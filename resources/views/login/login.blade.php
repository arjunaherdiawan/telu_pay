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
<body class="font-outfit min-h-screen flex items-center justify-center bg-gray-50 bg-gradient-to-br from-white via-red-50 to-gray-200 overflow-x-hidden relative py-12">
    
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

        <!-- Account Type Tabs -->
        <div class="flex p-1 mb-8 bg-gray-100 rounded-2xl w-full mx-auto">
            <button type="button" id="tab-mahasiswa" onclick="switchTab('mahasiswa')" class="flex-1 py-3 rounded-xl text-sm font-bold bg-white text-telkom-red shadow-sm transition-all duration-300">
                Mahasiswa
            </button>
            <button type="button" id="tab-merchant" onclick="switchTab('merchant')" class="flex-1 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-700 transition-all duration-300">
                Merchant
            </button>
        </div>

        <!-- MAHASISWA LOGIN -->
        <form action="#" id="mahasiswa-form" class="space-y-6 block animate-fade-in-up">
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none transition-colors group-focus-within:text-telkom-red text-gray-400">
                    <i data-lucide="user" class="w-5 h-5"></i>
                </div>
                <input type="text" name="username" placeholder="Username" 
                    class="w-full py-4.5 pl-14 pr-5 h-16 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none transition-colors group-focus-within:text-telkom-red text-gray-400">
                    <i data-lucide="key-round" class="w-5 h-5"></i>
                </div>
                <input type="password" name="password" id="password" placeholder="Password" 
                    class="w-full py-4.5 pl-14 pr-12 h-16 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
                <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                    <i data-lucide="eye" id="togglePassword" class="text-gray-400 w-5 h-5 cursor-pointer hover:text-telkom-red transition-colors"></i>
                </div>
            </div>
            <div class="text-right">
                <a href="#" class="text-sm font-semibold text-telkom-red hover:text-telkom-maroon transition-colors">Forgot Password?</a>
            </div>
            <button type="submit" class="w-full py-5 bg-telkom-red text-white text-lg font-bold rounded-2xl shadow-xl shadow-red-100 hover:bg-telkom-maroon transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                Log In
            </button>
        </form>

        <!-- MERCHANT LOGIN -->
        <form action="#" id="merchant-form" class="space-y-6 hidden animate-fade-in-up">
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none transition-colors group-focus-within:text-telkom-red text-gray-400">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                </div>
                <input type="email" name="username" placeholder="Email Address" 
                    class="w-full py-4.5 pl-14 pr-5 h-16 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none transition-colors group-focus-within:text-telkom-red text-gray-400">
                    <i data-lucide="key-round" class="w-5 h-5"></i>
                </div>
                <input type="password" name="password" id="m_password" placeholder="Password" 
                    class="w-full py-4.5 pl-14 pr-12 h-16 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all duration-300 placeholder:text-gray-400 text-gray-800"
                    required>
                <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                    <i data-lucide="eye" id="m_togglePassword" class="text-gray-400 w-5 h-5 cursor-pointer hover:text-telkom-red transition-colors"></i>
                </div>
            </div>
            <div class="text-right">
                <a href="#" class="text-sm font-semibold text-telkom-red hover:text-telkom-maroon transition-colors">Forgot Password?</a>
            </div>
            <button type="submit" class="w-full py-5 bg-telkom-red text-white text-lg font-bold rounded-2xl shadow-xl shadow-red-100 hover:bg-telkom-maroon transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                Log In as Merchant
            </button>
        </form>

        <p class="mt-10 text-gray-500 text-sm font-medium">
            Don't have an account? <a href="/register" class="text-telkom-red font-bold hover:underline">Create one</a>
        </p>
    </div>

    <script>
        lucide.createIcons();
        function switchTab(tab) {
            const mhsForm = document.getElementById('mahasiswa-form');
            const merchForm = document.getElementById('merchant-form');
            const tabMhs = document.getElementById('tab-mahasiswa');
            const tabMerch = document.getElementById('tab-merchant');

            if (tab === 'mahasiswa') {
                mhsForm.classList.remove('hidden');
                mhsForm.classList.add('block');
                merchForm.classList.remove('block');
                merchForm.classList.add('hidden');
                
                tabMhs.className = "flex-1 py-3 rounded-xl text-sm font-bold bg-white text-telkom-red shadow-sm transition-all duration-300";
                tabMerch.className = "flex-1 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-700 transition-all duration-300";
            } else {
                merchForm.classList.remove('hidden');
                merchForm.classList.add('block');
                mhsForm.classList.remove('block');
                mhsForm.classList.add('hidden');

                tabMerch.className = "flex-1 py-3 rounded-xl text-sm font-bold bg-white text-telkom-red shadow-sm transition-all duration-300";
                tabMhs.className = "flex-1 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-700 transition-all duration-300";
            }
        }

        function setupPasswordToggle(toggleId, inputId) {
            const toggle = document.querySelector(toggleId);
            const input = document.querySelector(inputId);
            toggle.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.setAttribute('data-lucide', type === 'password' ? 'eye' : 'eye-off');
                lucide.createIcons();
            });
        }

        setupPasswordToggle('#togglePassword', '#password');
        setupPasswordToggle('#m_togglePassword', '#m_password');

        async function handleLogin(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = 'Logging in...';
            btn.disabled = true;

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    localStorage.setItem('auth_token', result.access_token);
                    window.location.href = '/dashboard';
                } else {
                    alert('Login Failed: ' + (result.message || 'Invalid credentials'));
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
            } catch (error) {
                console.error(error);
                alert('An error occurred during login.');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        }

        document.getElementById('mahasiswa-form').addEventListener('submit', handleLogin);
        document.getElementById('merchant-form').addEventListener('submit', handleLogin);
    </script>
</body>
</html>
