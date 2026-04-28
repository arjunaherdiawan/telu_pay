<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telu-Pay - Student Dashboard</title>
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
                            dark: '#1a1a1a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="font-outfit bg-gray-50 text-gray-900 min-h-screen pb-24">
    
    <!-- Top Header / Wallet Section -->
    <div class="bg-telkom-maroon bg-gradient-to-br from-telkom-maroon to-red-900 pt-8 pb-12 px-6 rounded-b-[40px] shadow-2xl shadow-red-900/20 relative">
        <div class="max-w-7xl mx-auto flex items-center justify-between mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                    <i data-lucide="layers" class="text-telkom-maroon w-6 h-6"></i>
                </div>
                <span class="text-2xl font-bold text-white tracking-tight">Telu-Pay</span>
            </div>
            <div class="flex items-center space-x-4">
                <button class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-white backdrop-blur-md">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                </button>
                <div class="w-10 h-10 bg-white/20 rounded-full border-2 border-white/30 overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Mahasiswa+Telkom&background=random" alt="Profile">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto space-y-2 animate-fade-in">
            <p class="text-white/70 text-sm font-medium ml-1">Your Balance</p>
            <div class="flex items-baseline space-x-2">
                <span class="text-white/80 text-2xl font-medium">Rp</span>
                <h1 id="balance-text" class="text-5xl font-bold text-white tracking-tight" data-value="1.250.000">1.250.000</h1>
                <button id="toggle-balance" class="ml-2 text-white/50 hover:text-white transition-colors">
                    <i data-lucide="eye" id="eye-icon" class="w-5 h-5"></i>
                </button>
            </div>
            <p class="text-white/60 text-xs mt-2 inline-flex items-center">
                <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
            </p>
        </div>

        <!-- Ambient Glow -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Quick Actions Card -->
    <div class="max-w-7xl mx-auto -mt-6 px-6">
        <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100">
            <button class="w-full flex items-center justify-center space-x-4 bg-red-50 text-telkom-red p-4 rounded-2xl shadow-sm hover:bg-telkom-red hover:text-white transition-all duration-300 group">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                    <i data-lucide="plus-circle" class="w-6 h-6"></i>
                </div>
                <span class="text-lg font-bold">Top Up</span>
            </button>
        </div>
    </div>

    <!-- History Section -->
    <div class="max-w-7xl mx-auto mt-12 px-6 space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-800">Recent Transactions</h2>
            <a href="#" class="text-telkom-red text-sm font-bold hover:underline">See All</a>
        </div>

        <div class="space-y-4">
            <!-- Usage History -->
            <div class="bg-white p-4 rounded-2xl flex items-center justify-between shadow-sm border border-gray-50 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-600">
                        <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Kantin Teknik</p>
                        <p class="text-xs text-gray-400">22 April, 12:45</p>
                    </div>
                </div>
                <p class="font-bold text-telkom-maroon">- Rp 15.000</p>
            </div>

            <!-- Top Up History -->
            <div class="bg-white p-4 rounded-2xl flex items-center justify-between shadow-sm border border-gray-50 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600">
                        <i data-lucide="arrow-down-left" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Top Up Saldo</p>
                        <p class="text-xs text-gray-400">21 April, 09:30</p>
                    </div>
                </div>
                <p class="font-bold text-green-600">+ Rp 100.000</p>
            </div>

            <div class="bg-white p-4 rounded-2xl flex items-center justify-between shadow-sm border border-gray-50 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-600">
                        <i data-lucide="bus" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">T-Bus Ticket</p>
                        <p class="text-xs text-gray-400">20 April, 17:10</p>
                    </div>
                </div>
                <p class="font-bold text-telkom-maroon">- Rp 5.000</p>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md border-t border-gray-100 px-12 h-16 flex items-center justify-between z-50 shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
        <button class="flex flex-col items-center justify-center space-y-1 text-gray-400 hover:text-telkom-red transition-all group w-16 h-full pt-1">
            <i data-lucide="history" class="w-5 h-5 transition-transform group-hover:scale-110"></i>
            <span class="text-[10px] font-bold uppercase tracking-widest">History</span>
        </button>
        
        <button class="relative flex flex-col items-center justify-center w-16 h-full group">
            <div class="absolute -top-6 bg-telkom-red text-white p-3.5 rounded-2xl shadow-xl shadow-red-200 group-hover:bg-telkom-maroon transition-all transform group-hover:-translate-y-1 duration-300 flex items-center justify-center">
                <i data-lucide="home" class="w-6 h-6"></i>
            </div>
            <span class="text-[10px] font-bold uppercase tracking-widest text-telkom-red absolute bottom-2">Home</span>
        </button>

        <button class="flex flex-col items-center justify-center space-y-1 text-gray-400 hover:text-telkom-red transition-all group w-16 h-full pt-1">
            <i data-lucide="user" class="w-5 h-5 transition-transform group-hover:scale-110"></i>
            <span class="text-[10px] font-bold uppercase tracking-widest">Profile</span>
        </button>
    </nav>

    <script>
        lucide.createIcons();

        // Balance visibility toggle logic
        const toggleBtn = document.querySelector('#toggle-balance');
        const balanceText = document.querySelector('#balance-text');
        const eyeIcon = document.querySelector('#eye-icon');
        let isHidden = false;

        toggleBtn.addEventListener('click', () => {
            isHidden = !isHidden;
            if (isHidden) {
                balanceText.innerText = '••••••••';
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            } else {
                balanceText.innerText = balanceText.getAttribute('data-value');
                eyeIcon.setAttribute('data-lucide', 'eye');
            }
            lucide.createIcons();
        });
    </script>
</body>
</html>
