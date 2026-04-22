<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telu-Pay - Create your Account</title>
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
<body class="font-outfit min-h-screen flex items-center justify-center bg-gray-50 bg-gradient-to-br from-white via-red-50 to-gray-200 py-20 px-4 relative overflow-x-hidden">
    
    <!-- Ambient Red Glows -->
    <div class="absolute w-[800px] h-[800px] -bottom-64 -left-64 bg-red-100 rounded-full blur-[120px] opacity-40"></div>

    <div class="container max-w-[900px] bg-white rounded-[40px] shadow-2xl shadow-red-100 border border-gray-100 p-8 md:p-14 relative z-10 animate-fade-in-up">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16 space-y-4 md:space-y-0">
            <div class="space-y-2">
                <h1 class="text-gray-900 text-4xl font-bold tracking-tight">Create your Account</h1>
                <p class="text-gray-500 font-medium">Join Telu-Pay ecosystem today.</p>
            </div>
            <!-- Pentagon Logo with inline CSS for clip-path while using Tailwind for other styles -->
            <div class="w-16 h-16 bg-telkom-red flex items-center justify-center shadow-xl shadow-red-100 transform rotate-12 rounded-2xl" style="clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);">
                <i data-lucide="user-plus" class="text-white w-8 h-8"></i>
            </div>
        </div>

        <form action="#" class="space-y-12">
            <!-- Student Data Section -->
            <div class="space-y-8">
                <h2 class="text-gray-800 font-bold text-xl flex items-center">
                    <span class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center mr-3 text-xs">01</span>
                    Student Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Student ID</label>
                        <input type="text" placeholder="e.g. STU123" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">NIM</label>
                        <input type="text" placeholder="e.g. 1301xxxxxx" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group md:col-span-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Full Name</label>
                        <input type="text" placeholder="Enter your full legal name" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Email Address</label>
                        <input type="email" placeholder="student@telu.ac.id" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Phone Number</label>
                        <input type="text" placeholder="08xxxxxxxx" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                </div>
            </div>

            <!-- Credentials Section -->
            <div class="space-y-8">
                <h2 class="text-gray-800 font-bold text-xl flex items-center">
                    <span class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center mr-3 text-xs">02</span>
                    Account Credentials
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <div class="space-y-2 group md:col-span-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Username</label>
                        <input type="text" placeholder="Choose a unique username" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Password</label>
                        <input type="password" placeholder="••••••••" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Confirm Password</label>
                        <input type="password" placeholder="••••••••" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-8 pt-10 border-t border-gray-100">
                <p class="text-gray-500 font-medium">
                    Joined before? <a href="/login" class="text-telkom-red font-bold hover:underline transition-all">Sign in instead</a>
                </p>
                <button type="submit" 
                    class="w-full md:w-auto px-12 py-5 bg-telkom-red text-white text-lg font-bold rounded-2xl shadow-xl shadow-red-100 hover:bg-telkom-maroon transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                    Create Account
                </button>
            </div>
        </form>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
