<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telu-Pay - Telkom University Payment Solution</title>
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
                            grey: '#58595b',
                        }
                    },
                    animation: {
                        'slow-fade': 'fadeIn 1.5s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    backgroundImage: {
                        'hero-radial': 'radial-gradient(circle at 70% 30%, rgba(227, 6, 19, 0.05) 0%, rgba(255, 255, 255, 1) 70%)',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-outfit bg-white text-gray-900 overflow-x-hidden">
    
    <!-- Hero Section -->
    <div class="relative min-h-screen bg-hero-radial">
        
        <!-- Navbar -->
        <nav class="fixed top-0 w-full z-50 backdrop-blur-xl bg-white/70 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-telkom-red rounded-lg flex items-center justify-center shadow-lg shadow-red-200">
                        <i data-lucide="wallet" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-800">Telu-Pay</span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8 text-sm font-semibold text-gray-600">
                    <a href="#" class="hover:text-telkom-red transition-colors">About</a>
                    <a href="#" class="hover:text-telkom-red transition-colors">Contact</a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="/register" class="text-sm font-semibold text-gray-600 hover:text-telkom-red px-4 py-2 hover:bg-gray-50 rounded-full transition-all">Sign up</a>
                    <a href="/login" class="bg-telkom-red text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-lg shadow-red-100 hover:bg-telkom-maroon transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                        Sign in
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 pt-32 lg:pt-48 pb-20 relative flex flex-col lg:flex-row items-center">
            
            <!-- Left Side: Text -->
            <div class="w-full lg:w-1/2 space-y-8 z-10 animate-slow-fade">
                <div class="inline-flex items-center space-x-2 px-4 py-2 bg-red-50 text-telkom-red rounded-full text-xs font-bold uppercase tracking-widest border border-red-100">
                    <span class="w-2 h-2 bg-telkom-red rounded-full animate-pulse"></span>
                    <span>Official Telkom University Wallet</span>
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-[1.1] tracking-tight">
                    Smart Payments for <span class="text-telkom-red">Smart Campus.</span>
                </h1>
                
                <p class="text-lg text-gray-600 max-w-lg leading-relaxed text-balance">
                    Designed specifically for Telkom University students. Manage your tuition, meals, and academic needs with one seamless application. 
                </p>

                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 pt-4">
                    <a href="/register" class="w-full sm:w-auto px-8 py-4 bg-telkom-red text-white rounded-2xl font-bold text-lg shadow-xl shadow-red-200 hover:bg-telkom-maroon hover:shadow-2xl transition-all flex items-center justify-center group">
                        Get Started Now
                        <i data-lucide="arrow-right" class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <div class="flex items-center space-x-3 text-gray-500 font-medium">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200"></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-300"></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-400"></div>
                        </div>
                        <span class="text-sm">Still In Development</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: The Image -->
            <div class="w-full lg:w-1/2 mt-16 lg:mt-0 relative flex justify-center lg:justify-end">
                <div class="relative w-full max-w-[600px] animate-float">
                    <!-- Decorative background shapes -->
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-red-100 rounded-full blur-3xl opacity-60"></div>
                    <div class="absolute -bottom-10 -right-10 w-60 h-60 bg-blue-100 rounded-full blur-3xl opacity-40"></div>
                    
                    <!-- The User-provided Image with a professional treatment -->
                    <div class="relative z-10 p-2 bg-white rounded-3xl shadow-2xl shadow-gray-200 border border-gray-100">
                        <img src="/telkom_students.jpg" alt="Telkom University Students" class="rounded-2xl w-full object-cover">
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Footer Branding -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex items-center space-x-8 opacity-40 grayscale hover:grayscale-0 transition-all cursor-default">
            <span class="font-bold text-xl">Telkom University</span>
            <div class="h-4 w-px bg-gray-400"></div>
            <span class="font-bold text-xl uppercase tracking-widest">Telu-Pay</span>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
