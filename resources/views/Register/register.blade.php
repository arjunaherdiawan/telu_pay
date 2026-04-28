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
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 space-y-4 md:space-y-0">
            <div class="space-y-2">
                <h1 class="text-gray-900 text-4xl font-bold tracking-tight">Create your Account</h1>
                <p class="text-gray-500 font-medium">Join Telu-Pay ecosystem today.</p>
            </div>
            <!-- Pentagon Logo -->
            <div class="w-16 h-16 bg-telkom-red flex items-center justify-center shadow-xl shadow-red-100 transform rotate-12 rounded-2xl" style="clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);">
                <i data-lucide="user-plus" class="text-white w-8 h-8"></i>
            </div>
        </div>

        <!-- Account Type Tabs -->
        <div class="flex p-1 mb-12 bg-gray-100 rounded-2xl max-w-sm">
            <button type="button" id="tab-mahasiswa" onclick="switchTab('mahasiswa')" class="flex-1 py-3 px-6 rounded-xl text-sm font-bold bg-white text-telkom-red shadow-sm transition-all duration-300">
                Mahasiswa
            </button>
            <button type="button" id="tab-merchant" onclick="switchTab('merchant')" class="flex-1 py-3 px-6 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-700 transition-all duration-300">
                Merchant
            </button>
        </div>

        <!-- MAHASISWA FORM -->
        <form action="#" id="mahasiswa-form" class="space-y-12 block animate-fade-in-up">
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
                        <input type="text" placeholder="08xxxxxxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
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
                    <div class="space-y-2 group relative">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Password</label>
                        <div class="relative">
                            <input type="password" id="password" placeholder="••••••••" 
                                class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300 pr-14">
                            <button type="button" onclick="togglePass('password', 'eye-pass')" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-telkom-red transition-colors">
                                <i data-lucide="eye" id="eye-pass" class="w-5 h-5"></i>
                            </button>
                        </div>
                        <!-- Strength Indicator -->
                        <div class="mt-4 px-2">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Strength</span>
                                <span id="strength-text" class="text-[10px] font-bold text-gray-400 uppercase transition-colors">None</span>
                            </div>
                            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden flex">
                                <div id="strength-bar" class="h-full w-0 transition-all duration-500 rounded-full bg-gray-300"></div>
                            </div>
                        </div>
                        <!-- Validation Hints -->
                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-4 px-2">
                            <div id="req-len" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>8+ Characters</span>
                            </div>
                            <div id="req-num" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>1 Number</span>
                            </div>
                            <div id="req-upper" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>1 Uppercase</span>
                            </div>
                            <div id="req-spec" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>1 Special (@$!%*?)</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2 group relative">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="confirm_password" placeholder="••••••••" 
                                class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300 pr-14">
                            <button type="button" onclick="togglePass('confirm_password', 'eye-confirm')" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-telkom-red transition-colors">
                                <i data-lucide="eye" id="eye-confirm" class="w-5 h-5"></i>
                            </button>
                        </div>
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

        <!-- MERCHANT FORM -->
        <form action="#" id="merchant-form" class="space-y-12 hidden animate-fade-in-up">
            <div class="space-y-8">
                <h2 class="text-gray-800 font-bold text-xl flex items-center">
                    <span class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center mr-3 text-xs">01</span>
                    Merchant Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Owner Full Name</label>
                        <input type="text" placeholder="Enter your full legal name" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Store Name</label>
                        <input type="text" placeholder="e.g. Telu Kantin #1" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Phone Number</label>
                        <input type="text" placeholder="08xxxxxxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Email Address</label>
                        <input type="email" placeholder="merchant@telu.ac.id" 
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                    <div class="space-y-2 group relative">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Bank Selection</label>
                        <div class="relative">
                            <select class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Bank</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="DANA">DANA</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none text-gray-400">
                                <i data-lucide="chevron-down" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2 group">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Account Number</label>
                        <input type="text" placeholder="e.g. 1234567890" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300">
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <h2 class="text-gray-800 font-bold text-xl flex items-center">
                    <span class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center mr-3 text-xs">02</span>
                    Account Credentials
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <div class="space-y-2 group relative">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Password</label>
                        <div class="relative">
                            <input type="password" id="m_password" placeholder="••••••••" 
                                class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300 pr-14">
                            <button type="button" onclick="togglePass('m_password', 'm_eye-pass')" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-telkom-red transition-colors">
                                <i data-lucide="eye" id="m_eye-pass" class="w-5 h-5"></i>
                            </button>
                        </div>
                        <!-- Strength Indicator -->
                        <div class="mt-4 px-2">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Strength</span>
                                <span id="m_strength-text" class="text-[10px] font-bold text-gray-400 uppercase transition-colors">None</span>
                            </div>
                            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden flex">
                                <div id="m_strength-bar" class="h-full w-0 transition-all duration-500 rounded-full bg-gray-300"></div>
                            </div>
                        </div>
                        <!-- Validation Hints -->
                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-4 px-2">
                            <div id="m_req-len" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>8+ Characters</span>
                            </div>
                            <div id="m_req-num" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>1 Number</span>
                            </div>
                            <div id="m_req-upper" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>1 Uppercase</span>
                            </div>
                            <div id="m_req-spec" class="flex items-center space-x-2 text-[10px] font-bold text-gray-300 transition-all duration-300">
                                <div class="w-1.5 h-1.5 rounded-full bg-current"></div>
                                <span>1 Special (@$!%*?)</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2 group relative">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="m_confirm_password" placeholder="••••••••" 
                                class="w-full py-4 px-6 rounded-2xl bg-gray-50 border-2 border-transparent outline-none focus:bg-white focus:border-telkom-red/10 focus:shadow-lg transition-all text-gray-800 placeholder:text-gray-300 pr-14">
                            <button type="button" onclick="togglePass('m_confirm_password', 'm_eye-confirm')" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-telkom-red transition-colors">
                                <i data-lucide="eye" id="m_eye-confirm" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-8 pt-10 border-t border-gray-100">
                <p class="text-gray-500 font-medium">
                    Joined before? <a href="/login" class="text-telkom-red font-bold hover:underline transition-all">Sign in instead</a>
                </p>
                <button type="submit" 
                    class="w-full md:w-auto px-12 py-5 bg-telkom-red text-white text-lg font-bold rounded-2xl shadow-xl shadow-red-100 hover:bg-telkom-maroon transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                    Register Merchant
                </button>
            </div>
        </form>
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
                
                tabMhs.className = "flex-1 py-3 px-6 rounded-xl text-sm font-bold bg-white text-telkom-red shadow-sm transition-all duration-300";
                tabMerch.className = "flex-1 py-3 px-6 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-700 transition-all duration-300";
            } else {
                merchForm.classList.remove('hidden');
                merchForm.classList.add('block');
                mhsForm.classList.remove('block');
                mhsForm.classList.add('hidden');

                tabMerch.className = "flex-1 py-3 px-6 rounded-xl text-sm font-bold bg-white text-telkom-red shadow-sm transition-all duration-300";
                tabMhs.className = "flex-1 py-3 px-6 rounded-xl text-sm font-bold text-gray-500 hover:text-gray-700 transition-all duration-300";
            }
        }

        function togglePass(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.setAttribute('data-lucide', 'eye-off');
            } else {
                input.type = 'password';
                icon.setAttribute('data-lucide', 'eye');
            }
            lucide.createIcons();
        }

        const password = document.getElementById('password');
        const reqLen = document.getElementById('req-len');
        const reqNum = document.getElementById('req-num');
        const reqUpper = document.getElementById('req-upper');
        const reqSpec = document.getElementById('req-spec');

        function validatePasswordInput(val, elLen, elNum, elUpper, elSpec, barEl, textEl) {
            const hasLen = val.length >= 8;
            const hasNum = /[0-9]/.test(val);
            const hasUpper = /[A-Z]/.test(val);
            const hasSpec = /[@$!%*?&#]/.test(val);

            updateStatus(elLen, hasLen);
            updateStatus(elNum, hasNum);
            updateStatus(elUpper, hasUpper);
            updateStatus(elSpec, hasSpec);

            // Calculate Strength
            let score = 0;
            if (val.length > 0) {
                if (hasLen) score++;
                if (hasNum) score++;
                if (hasUpper) score++;
                if (hasSpec) score++;
            }

            // Update UI
            barEl.className = 'h-full transition-all duration-500 rounded-full';
            textEl.className = 'text-[10px] font-bold uppercase transition-colors';

            if (val.length === 0) {
                barEl.classList.add('w-0', 'bg-gray-300');
                textEl.innerText = 'None';
                textEl.classList.add('text-gray-400');
            } else if (score <= 2) {
                barEl.classList.add('w-1/3', 'bg-telkom-red');
                textEl.innerText = 'Weak';
                textEl.classList.add('text-telkom-red');
            } else if (score === 3) {
                barEl.classList.add('w-2/3', 'bg-yellow-400');
                textEl.innerText = 'Normal';
                textEl.classList.add('text-yellow-500');
            } else {
                barEl.classList.add('w-full', 'bg-green-500');
                textEl.innerText = 'Strong';
                textEl.classList.add('text-green-500');
            }
        }

        const strengthBar = document.getElementById('strength-bar');
        const strengthText = document.getElementById('strength-text');
        
        password.addEventListener('input', () => {
            validatePasswordInput(password.value, reqLen, reqNum, reqUpper, reqSpec, strengthBar, strengthText);
        });

        const m_password = document.getElementById('m_password');
        const m_reqLen = document.getElementById('m_req-len');
        const m_reqNum = document.getElementById('m_req-num');
        const m_reqUpper = document.getElementById('m_req-upper');
        const m_reqSpec = document.getElementById('m_req-spec');
        const m_strengthBar = document.getElementById('m_strength-bar');
        const m_strengthText = document.getElementById('m_strength-text');

        m_password.addEventListener('input', () => {
            validatePasswordInput(m_password.value, m_reqLen, m_reqNum, m_reqUpper, m_reqSpec, m_strengthBar, m_strengthText);
        });

        function updateStatus(el, isValid) {
            if (isValid) {
                el.classList.remove('text-gray-300');
                el.classList.add('text-green-500');
            } else {
                el.classList.remove('text-green-500');
                el.classList.add('text-gray-300');
            }
        }
    </script>
</body>
</html>
