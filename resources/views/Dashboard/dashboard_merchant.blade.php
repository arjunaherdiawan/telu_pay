<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telu-Pay - Merchant Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { outfit: ['Outfit', 'sans-serif'] },
                colors: { telkom: { red: '#e30613', maroon: '#9b1b30', dark: '#1a1a1a' } }
            }}
        }
    </script>
    <style>
        .hide-scrollbar::-webkit-scrollbar{display:none}
        .hide-scrollbar{-ms-overflow-style:none;scrollbar-width:none}
        .product-card{transition:all .3s cubic-bezier(.4,0,.2,1)}
        .product-card:hover{transform:translateY(-4px);box-shadow:0 12px 24px rgba(0,0,0,.08)}
        .sidebar{transition:width .3s ease,transform .3s ease}
        .page-section{display:none}.page-section.active{display:block}
        .dropdown-menu{display:none;opacity:0;transform:translateY(-8px);transition:opacity .2s,transform .2s}
        .dropdown-menu.show{display:block;opacity:1;transform:translateY(0)}
    </style>
</head>
<body class="font-outfit bg-gray-50 text-gray-900 min-h-screen flex">

<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar fixed lg:relative z-50 h-screen bg-white border-r border-gray-100 shadow-lg flex flex-col w-64 shrink-0">
    <div class="p-5 flex items-center space-x-3 border-b border-gray-100">
        <div class="w-9 h-9 bg-telkom-red rounded-xl flex items-center justify-center">
            <i data-lucide="layers" class="text-white w-5 h-5"></i>
        </div>
        <span id="brandText" class="text-lg font-bold text-gray-900 tracking-tight">Telu-Pay</span>
    </div>
    <nav class="flex-1 p-4 space-y-1">
        <button onclick="showPage('dashboard')" id="nav-dashboard" class="nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-bold bg-telkom-red text-white transition-all">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i><span class="nav-label">Dashboard</span>
        </button>
        <button onclick="showPage('order')" id="nav-order" class="nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-bold text-gray-500 hover:bg-red-50 hover:text-telkom-red transition-all">
            <i data-lucide="shopping-cart" class="w-5 h-5"></i><span class="nav-label">Order</span>
        </button>
        <button onclick="showPage('transaction')" id="nav-transaction" class="nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-bold text-gray-500 hover:bg-red-50 hover:text-telkom-red transition-all">
            <i data-lucide="receipt" class="w-5 h-5"></i><span class="nav-label">Transaction</span>
        </button>
    </nav>
    <div class="p-4 border-t border-gray-100">
        <p class="text-[10px] text-gray-300 font-medium text-center">Telu-Pay Merchant v1.0</p>
    </div>
</aside>

<!-- MAIN CONTENT -->
<div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
    <!-- TOP BAR -->
    <header class="bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm">
        <div class="px-6 py-3 flex items-center justify-between">
            <button onclick="toggleSidebar()" class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center text-gray-500 hover:bg-red-50 hover:text-telkom-red transition-colors">
                <i data-lucide="panel-left" class="w-5 h-5"></i>
            </button>
            <div class="relative">
                <button onclick="toggleDropdown()" id="userBtn" class="flex items-center space-x-3 bg-gray-50 hover:bg-red-50 rounded-2xl px-4 py-2 transition-colors group cursor-pointer">
                    <div class="w-9 h-9 bg-telkom-red/10 rounded-full overflow-hidden border-2 border-telkom-red/20">
                        <img src="https://ui-avatars.com/api/?name=Telu+Kantin&background=e30613&color=fff&bold=true" alt="Merchant">
                    </div>
                    <span class="text-sm font-bold text-gray-800 hidden sm:block">Telu Kantin</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                </button>
                <!-- Dropdown -->
                <div id="userDropdown" class="dropdown-menu absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-100 bg-gray-50">
                        <p class="font-bold text-sm text-gray-800">Telu Kantin #1</p>
                        <p class="text-xs text-gray-400">arjuna123@gmail.com</p>
                    </div>
                    <div class="p-2">
                        <button onclick="showModal('settingModal')" class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                            <i data-lucide="settings" class="w-4 h-4"></i><span>Settings</span>
                        </button>
                        <button onclick="showModal('withdrawModal')" class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                            <i data-lucide="wallet" class="w-4 h-4"></i><span>Withdraw</span>
                        </button>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="/login" class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-red-500 hover:bg-red-50 transition-colors">
                            <i data-lucide="log-out" class="w-4 h-4"></i><span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 p-6 overflow-y-auto">

<!-- PAGE: DASHBOARD -->
<div id="page-dashboard" class="page-section active">
<h1 class="text-2xl font-bold mb-6">Dashboard Overview</h1>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-xs text-gray-400 font-bold uppercase">Saldo Akun</p>
        <p class="text-2xl font-bold text-gray-900 mt-2">Rp 1.250.000</p>
        <p class="text-xs text-green-500 mt-1 flex items-center"><i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>Active</p>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-xs text-gray-400 font-bold uppercase">Penjualan Hari Ini</p>
        <p class="text-2xl font-bold text-telkom-red mt-2">Rp 350.000</p>
        <p class="text-xs text-gray-400 mt-1">23 transaksi</p>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-xs text-gray-400 font-bold uppercase">Penjualan Minggu Ini</p>
        <p class="text-2xl font-bold text-gray-900 mt-2">Rp 2.150.000</p>
        <p class="text-xs text-gray-400 mt-1">142 transaksi</p>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-xs text-gray-400 font-bold uppercase">Penjualan Bulan Ini</p>
        <p class="text-2xl font-bold text-gray-900 mt-2">Rp 8.500.000</p>
        <p class="text-xs text-gray-400 mt-1">580 transaksi</p>
    </div>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
    <h3 class="font-bold text-gray-800 mb-4">Transaksi Terakhir</h3>
    <div class="space-y-3">
        <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl"><div class="flex items-center space-x-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600"><i data-lucide="check-circle" class="w-4 h-4"></i></div><div><p class="font-bold text-sm">Nasi Goreng Spesial</p><p class="text-[10px] text-gray-400">2 menit lalu</p></div></div><p class="font-bold text-sm text-green-600">+Rp 18.000</p></div>
        <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl"><div class="flex items-center space-x-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600"><i data-lucide="check-circle" class="w-4 h-4"></i></div><div><p class="font-bold text-sm">Es Teh Manis x2</p><p class="text-[10px] text-gray-400">15 menit lalu</p></div></div><p class="font-bold text-sm text-green-600">+Rp 10.000</p></div>
        <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl"><div class="flex items-center space-x-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600"><i data-lucide="check-circle" class="w-4 h-4"></i></div><div><p class="font-bold text-sm">Ayam Geprek + Kopi</p><p class="text-[10px] text-gray-400">30 menit lalu</p></div></div><p class="font-bold text-sm text-green-600">+Rp 26.000</p></div>
    </div>
</div>
</div>

<!-- PAGE: ORDER (Cashier UI) -->
<div id="page-order" class="page-section">
<h1 class="text-2xl font-bold mb-6">Order / Kasir</h1>
<div class="flex flex-col lg:flex-row gap-6">
<div class="flex-1 space-y-4">
    <div class="flex items-center gap-3">
        <div class="flex-1 relative"><div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400"><i data-lucide="search" class="w-5 h-5"></i></div>
        <input type="text" id="searchInput" placeholder="Cari produk..." class="w-full py-3 pl-12 pr-4 rounded-2xl bg-white border-2 border-transparent outline-none focus:border-telkom-red/20 focus:shadow-lg shadow-sm transition-all text-gray-800 placeholder:text-gray-400"></div>
    </div>
    <div class="flex items-center space-x-2 overflow-x-auto hide-scrollbar pb-1">
        <button onclick="filterCat('all')" data-cat="all" class="cat-btn flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-bold border-2 border-gray-200 whitespace-nowrap transition-all bg-telkom-red text-white">Semua</button>
        <button onclick="filterCat('berat')" data-cat="berat" class="cat-btn flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-bold border-2 border-gray-200 text-gray-600 bg-white whitespace-nowrap transition-all">Makanan Berat</button>
        <button onclick="filterCat('ringan')" data-cat="ringan" class="cat-btn flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-bold border-2 border-gray-200 text-gray-600 bg-white whitespace-nowrap transition-all">Makanan Ringan</button>
        <button onclick="filterCat('minuman')" data-cat="minuman" class="cat-btn flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-bold border-2 border-gray-200 text-gray-600 bg-white whitespace-nowrap transition-all">Minuman</button>
        <button onclick="filterCat('snack')" data-cat="snack" class="cat-btn flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-bold border-2 border-gray-200 text-gray-600 bg-white whitespace-nowrap transition-all">Snack</button>
    </div>
    <div id="productGrid" class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-3">
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="berat" data-name="Nasi Goreng Spesial" data-price="18000"><div class="aspect-square bg-gradient-to-br from-red-50 to-orange-50 flex items-center justify-center"><i data-lucide="utensils" class="w-10 h-10 text-telkom-red/30"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Nasi Goreng Spesial</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 18.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="berat" data-name="Mie Ayam Bakso" data-price="15000"><div class="aspect-square bg-gradient-to-br from-amber-50 to-yellow-50 flex items-center justify-center"><i data-lucide="soup" class="w-10 h-10 text-amber-400/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Mie Ayam Bakso</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 15.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="berat" data-name="Ayam Geprek" data-price="16000"><div class="aspect-square bg-gradient-to-br from-orange-50 to-red-50 flex items-center justify-center"><i data-lucide="drumstick" class="w-10 h-10 text-orange-400/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Ayam Geprek</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 16.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="berat" data-name="Nasi Padang" data-price="20000"><div class="aspect-square bg-gradient-to-br from-yellow-50 to-amber-50 flex items-center justify-center"><i data-lucide="utensils-crossed" class="w-10 h-10 text-yellow-500/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Nasi Padang</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 20.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="ringan" data-name="Dimsum Ayam" data-price="12000"><div class="aspect-square bg-gradient-to-br from-pink-50 to-rose-50 flex items-center justify-center"><i data-lucide="cherry" class="w-10 h-10 text-pink-400/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Dimsum Ayam</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 12.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="ringan" data-name="Risoles Mayo" data-price="8000"><div class="aspect-square bg-gradient-to-br from-green-50 to-emerald-50 flex items-center justify-center"><i data-lucide="sandwich" class="w-10 h-10 text-green-400/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Risoles Mayo</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 8.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="minuman" data-name="Es Teh Manis" data-price="5000"><div class="aspect-square bg-gradient-to-br from-teal-50 to-cyan-50 flex items-center justify-center"><i data-lucide="glass-water" class="w-10 h-10 text-teal-400/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Es Teh Manis</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 5.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="minuman" data-name="Kopi Susu" data-price="10000"><div class="aspect-square bg-gradient-to-br from-stone-50 to-amber-50 flex items-center justify-center"><i data-lucide="coffee" class="w-10 h-10 text-amber-700/30"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Kopi Susu</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 10.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="snack" data-name="Kentang Goreng" data-price="10000"><div class="aspect-square bg-gradient-to-br from-yellow-50 to-orange-50 flex items-center justify-center"><i data-lucide="popcorn" class="w-10 h-10 text-yellow-500/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Kentang Goreng</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 10.000</p></div></div>
        <div class="product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer" data-category="snack" data-name="Cireng Isi" data-price="7000"><div class="aspect-square bg-gradient-to-br from-lime-50 to-green-50 flex items-center justify-center"><i data-lucide="cookie" class="w-10 h-10 text-lime-500/40"></i></div><div class="p-3"><p class="font-bold text-xs text-gray-800 truncate">Cireng Isi</p><p class="text-telkom-red font-bold text-xs mt-1">Rp 7.000</p></div></div>
    </div>
</div>
<!-- Order Summary -->
<div class="w-full lg:w-[300px] shrink-0 bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-[80px] self-start">
    <h3 class="font-bold text-gray-800 mb-4">Ringkasan Pesanan</h3>
    <div id="orderList" class="space-y-2 mb-4 max-h-[250px] overflow-y-auto hide-scrollbar"><p class="text-xs text-gray-400 text-center py-6">Belum ada pesanan</p></div>
    <div class="border-t border-gray-100 pt-3 space-y-2">
        <div class="flex justify-between text-sm"><span class="text-gray-500">Subtotal</span><span id="subtotal" class="font-bold">Rp 0</span></div>
        <div class="flex justify-between text-lg font-bold"><span>Total</span><span id="totalPrice" class="text-telkom-red">Rp 0</span></div>
    </div>
    <button onclick="alert('Pesanan berhasil!')" class="w-full mt-4 py-3 bg-telkom-red text-white font-bold rounded-xl hover:bg-telkom-maroon transition-colors">Proses Pesanan</button>
</div>
</div>
</div>

<!-- PAGE: TRANSACTION -->
<div id="page-transaction" class="page-section">
<h1 class="text-2xl font-bold mb-6">Transaction History</h1>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-gray-100">
        <h3 class="font-bold text-gray-800">All Transactions</h3>
        <div class="flex items-center gap-2"><div class="relative"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400"><i data-lucide="search" class="w-4 h-4"></i></div><input type="text" placeholder="Search..." class="py-2 pl-9 pr-4 rounded-xl bg-gray-50 border border-gray-200 outline-none focus:border-telkom-red/30 text-sm w-48"></div></div>
    </div>
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead><tr class="bg-gray-50 text-gray-500 text-xs uppercase"><th class="px-5 py-3 text-left">No</th><th class="px-5 py-3 text-left">Order ID</th><th class="px-5 py-3 text-left">Tanggal</th><th class="px-5 py-3 text-left">Tipe</th><th class="px-5 py-3 text-left">Pembayaran</th><th class="px-5 py-3 text-left">Total</th></tr></thead>
        <tbody class="divide-y divide-gray-50">
            <tr class="hover:bg-gray-50 transition-colors"><td class="px-5 py-3">1</td><td class="px-5 py-3 font-bold text-gray-800">#000056</td><td class="px-5 py-3 text-gray-500">28 Apr 2026</td><td class="px-5 py-3"><span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">Dine In</span></td><td class="px-5 py-3">Telu-Pay</td><td class="px-5 py-3 font-bold text-green-600">Rp 55.000</td></tr>
            <tr class="hover:bg-gray-50 transition-colors"><td class="px-5 py-3">2</td><td class="px-5 py-3 font-bold text-gray-800">#000055</td><td class="px-5 py-3 text-gray-500">28 Apr 2026</td><td class="px-5 py-3"><span class="px-2 py-1 bg-orange-50 text-orange-600 rounded-lg text-xs font-bold">Take Away</span></td><td class="px-5 py-3">Telu-Pay</td><td class="px-5 py-3 font-bold text-green-600">Rp 80.000</td></tr>
            <tr class="hover:bg-gray-50 transition-colors"><td class="px-5 py-3">3</td><td class="px-5 py-3 font-bold text-gray-800">#000054</td><td class="px-5 py-3 text-gray-500">27 Apr 2026</td><td class="px-5 py-3"><span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">Dine In</span></td><td class="px-5 py-3">Telu-Pay</td><td class="px-5 py-3 font-bold text-green-600">Rp 120.000</td></tr>
            <tr class="hover:bg-gray-50 transition-colors"><td class="px-5 py-3">4</td><td class="px-5 py-3 font-bold text-gray-800">#000053</td><td class="px-5 py-3 text-gray-500">27 Apr 2026</td><td class="px-5 py-3"><span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">Dine In</span></td><td class="px-5 py-3">Telu-Pay</td><td class="px-5 py-3 font-bold text-green-600">Rp 130.000</td></tr>
            <tr class="hover:bg-gray-50 transition-colors"><td class="px-5 py-3">5</td><td class="px-5 py-3 font-bold text-gray-800">#000052</td><td class="px-5 py-3 text-gray-500">26 Apr 2026</td><td class="px-5 py-3"><span class="px-2 py-1 bg-orange-50 text-orange-600 rounded-lg text-xs font-bold">Take Away</span></td><td class="px-5 py-3">Telu-Pay</td><td class="px-5 py-3 font-bold text-green-600">Rp 52.000</td></tr>
            <tr class="hover:bg-gray-50 transition-colors"><td class="px-5 py-3">6</td><td class="px-5 py-3 font-bold text-gray-800">#000051</td><td class="px-5 py-3 text-gray-500">26 Apr 2026</td><td class="px-5 py-3"><span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">Dine In</span></td><td class="px-5 py-3">Telu-Pay</td><td class="px-5 py-3 font-bold text-green-600">Rp 155.000</td></tr>
        </tbody>
    </table>
    </div>
    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-xs text-gray-400">Showing 6 entries</p>
        <div class="flex items-center justify-between font-bold text-sm"><span class="text-gray-500 mr-3">Total Penjualan:</span><span class="text-telkom-red text-lg">Rp 592.000</span></div>
    </div>
</div>
</div>

    </main>
</div>

<!-- MODAL: Settings -->
<div id="settingModal" class="fixed inset-0 z-[60] flex items-center justify-center bg-black/40 backdrop-blur-sm hidden">
<div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-6 m-4 space-y-4">
    <div class="flex items-center justify-between"><h2 class="text-xl font-bold">Merchant Settings</h2><button onclick="hideModal('settingModal')" class="text-gray-400 hover:text-gray-700"><i data-lucide="x" class="w-5 h-5"></i></button></div>
    <div class="space-y-3">
        <div><label class="text-xs font-bold text-gray-400 uppercase">Nama Toko</label><input type="text" value="Telu Kantin #1" class="w-full mt-1 py-3 px-4 rounded-xl bg-gray-50 border border-gray-200 outline-none focus:border-telkom-red/30 text-sm" readonly></div>
        <div><label class="text-xs font-bold text-gray-400 uppercase">Email</label><input type="text" value="arjuna123@gmail.com" class="w-full mt-1 py-3 px-4 rounded-xl bg-gray-50 border border-gray-200 outline-none focus:border-telkom-red/30 text-sm" readonly></div>
        <div><label class="text-xs font-bold text-gray-400 uppercase">No. HP</label><input type="text" value="081234567890" class="w-full mt-1 py-3 px-4 rounded-xl bg-gray-50 border border-gray-200 outline-none focus:border-telkom-red/30 text-sm" readonly></div>
        <div><label class="text-xs font-bold text-gray-400 uppercase">Bank</label><input type="text" value="BCA - 1234567890" class="w-full mt-1 py-3 px-4 rounded-xl bg-gray-50 border border-gray-200 outline-none focus:border-telkom-red/30 text-sm" readonly></div>
    </div>
    <button onclick="alert('Edit mode aktif!')" class="w-full py-3 bg-gray-900 text-white font-bold rounded-xl hover:bg-telkom-maroon transition-colors">Edit Akun</button>
</div>
</div>

<!-- MODAL: Withdraw -->
<div id="withdrawModal" class="fixed inset-0 z-[60] flex items-center justify-center bg-black/40 backdrop-blur-sm hidden">
<div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-6 m-4 space-y-4">
    <div class="flex items-center justify-between"><h2 class="text-xl font-bold">Withdraw Saldo</h2><button onclick="hideModal('withdrawModal')" class="text-gray-400 hover:text-gray-700"><i data-lucide="x" class="w-5 h-5"></i></button></div>
    <div class="bg-red-50 rounded-xl p-4 text-center"><p class="text-xs text-gray-500">Saldo Tersedia</p><p class="text-2xl font-bold text-telkom-red">Rp 1.250.000</p></div>
    <div><label class="text-xs font-bold text-gray-400 uppercase">Jumlah Withdraw</label><input type="text" placeholder="Masukkan jumlah" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="w-full mt-1 py-3 px-4 rounded-xl bg-gray-50 border border-gray-200 outline-none focus:border-telkom-red/30 text-sm"></div>
    <div><label class="text-xs font-bold text-gray-400 uppercase">Rekening Tujuan</label><input type="text" value="BCA - 1234567890" class="w-full mt-1 py-3 px-4 rounded-xl bg-gray-50 border border-gray-200 outline-none text-sm" readonly></div>
    <button onclick="alert('Withdraw berhasil diproses!')" class="w-full py-3 bg-telkom-red text-white font-bold rounded-xl hover:bg-telkom-maroon transition-colors">Withdraw</button>
</div>
</div>

<script>
lucide.createIcons();
let sidebarOpen=true;
function toggleSidebar(){const s=document.getElementById('sidebar');sidebarOpen=!sidebarOpen;s.style.transform=sidebarOpen?'translateX(0)':'translateX(-100%)';s.style.width=sidebarOpen?'16rem':'0';}
function toggleDropdown(){document.getElementById('userDropdown').classList.toggle('show');}
document.addEventListener('click',e=>{if(!document.getElementById('userBtn').contains(e.target))document.getElementById('userDropdown').classList.remove('show');});
function showPage(p){document.querySelectorAll('.page-section').forEach(s=>s.classList.remove('active'));document.getElementById('page-'+p).classList.add('active');document.querySelectorAll('.nav-btn').forEach(b=>{b.className='nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-bold text-gray-500 hover:bg-red-50 hover:text-telkom-red transition-all';});document.getElementById('nav-'+p).className='nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-bold bg-telkom-red text-white transition-all';lucide.createIcons();}
function showModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById('userDropdown').classList.remove('show');lucide.createIcons();}
function hideModal(id){document.getElementById(id).classList.add('hidden');}
function filterCat(c){document.querySelectorAll('.cat-btn').forEach(b=>{b.classList.remove('bg-telkom-red','text-white');b.classList.add('bg-white','text-gray-600');});event.target.closest('.cat-btn').classList.add('bg-telkom-red','text-white');event.target.closest('.cat-btn').classList.remove('bg-white','text-gray-600');document.querySelectorAll('.product-card').forEach(card=>{card.style.display=(c==='all'||card.dataset.category===c)?'':'none';});}
document.getElementById('searchInput')?.addEventListener('input',function(){const q=this.value.toLowerCase();document.querySelectorAll('.product-card').forEach(c=>{c.style.display=c.dataset.name.toLowerCase().includes(q)?'':'none';});});
</script>
</body>
</html>
