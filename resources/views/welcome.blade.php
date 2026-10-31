<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB - Seleksi Penerimaan Mahasiswa Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a5f 0%, #2d6a9f 50%, #1e3a5f 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .hero-wave {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SP</span>
                    </div>
                    <span class="font-bold text-lg text-gray-800">SPMB Portal</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('spmb.cek_status') }}" class="text-gray-600 hover:text-blue-600 transition">Cek Status</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition font-medium">Login</a>
                    <a href="{{ route('spmb.register') }}" class="border border-blue-600 text-blue-600 px-5 py-2 rounded-lg hover:bg-blue-50 transition font-medium">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg pt-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-blue-400/20 rounded-full px-4 py-1.5 mb-6">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-blue-200 text-sm font-medium">Pendaftaran Dibuka!</span>
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
                        Selamat Datang di<br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">SPMB Online</span>
                    </h1>
                    <p class="text-blue-100 text-lg mb-8 leading-relaxed">
                        Sistem Seleksi Penerimaan Mahasiswa Baru terintegrasi. Daftar sekarang dan
                        raih masa depanmu di perguruan tinggi terbaik.
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ route('spmb.register') }}" class="bg-white text-blue-600 px-8 py-3.5 rounded-lg font-bold hover:bg-blue-50 transition shadow-lg inline-flex items-center">
                            Daftar Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                        <a href="{{ route('spmb.cek_status') }}" class="border-2 border-white/30 text-white px-8 py-3.5 rounded-lg font-bold hover:bg-white/10 transition inline-flex items-center">
                            Cek Status
                        </a>
                    </div>
                    <div class="flex items-center space-x-6 mt-10 text-blue-200 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1.5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Mudah & Cepat
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1.5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            Data Terjamin
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1.5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Tracking Real-time
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <div class="relative">
                        <div class="w-96 h-96 mx-auto">
                            <div class="absolute inset-0 bg-blue-400/10 rounded-full blur-3xl"></div>
                            <div class="relative bg-white/10 backdrop-blur rounded-2xl p-8 border border-white/20">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold">Formulir Pendaftaran</p>
                                        <p class="text-blue-200 text-sm">Lengkapi data diri</p>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="h-2 bg-white/20 rounded w-full"></div>
                                    <div class="h-2 bg-white/20 rounded w-3/4"></div>
                                    <div class="h-2 bg-white/20 rounded w-5/6"></div>
                                    <div class="h-2 bg-green-400/60 rounded w-2/3"></div>
                                </div>
                                <div class="mt-6 flex justify-between items-center">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 bg-yellow-400 rounded-full border-2 border-white"></div>
                                        <div class="w-8 h-8 bg-green-400 rounded-full border-2 border-white"></div>
                                        <div class="w-8 h-8 bg-blue-400 rounded-full border-2 border-white"></div>
                                    </div>
                                    <span class="text-blue-200 text-sm">87% selesai</span>
                                </div>
                                <div class="mt-4 w-full bg-white/20 rounded-full h-2">
                                    <div class="bg-green-400 h-2 rounded-full" style="width: 87%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 60C360 100 1080 100 1440 60V100H0V60Z" fill="white"/>
                <path d="M0 70C240 90 840 90 1440 70V100H0V70Z" fill="white" opacity="0.5"/>
            </svg>
        </div>
    </section>

    <!-- Fitur Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Kenapa Memilih SPMB Online?</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Kemudahan akses pendaftaran mahasiswa baru secara online dengan sistem yang terintegrasi dan transparan.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-blue-50 rounded-2xl p-8 card-hover transition-all">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Pendaftaran Online</h3>
                    <p class="text-gray-500 leading-relaxed">Daftar dari mana saja dan kapan saja tanpa harus datang ke kampus. Proses cepat hanya dalam hitungan menit.</p>
                </div>
                <div class="bg-green-50 rounded-2xl p-8 card-hover transition-all">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Tracking Real-time</h3>
                    <p class="text-gray-500 leading-relaxed">Pantau status pendaftaran secara real-time. Dapatkan notifikasi setiap ada perubahan status.</p>
                </div>
                <div class="bg-purple-50 rounded-2xl p-8 card-hover transition-all">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Keamanan Data</h3>
                    <p class="text-gray-500 leading-relaxed">Data pribadi Anda terjamin keamanannya dengan sistem enkripsi dan proteksi berlapis.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="gradient-bg py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-4xl font-bold text-white">500+</p>
                    <p class="text-blue-200 mt-2">Pendaftar Aktif</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-white">50+</p>
                    <p class="text-blue-200 mt-2">Program Studi</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-white">95%</p>
                    <p class="text-blue-200 mt-2">Kepuasan User</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-white">24/7</p>
                    <p class="text-blue-200 mt-2">Layanan Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-3xl p-12 shadow-xl">
                <h2 class="text-3xl font-bold text-white mb-4">Siap Memulai Perjalananmu?</h2>
                <p class="text-blue-200 mb-8 max-w-xl mx-auto">Daftarkan dirimu sekarang dan raih kesempatan menjadi bagian dari keluarga besar kami.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('spmb.register') }}" class="bg-white text-blue-600 px-8 py-3.5 rounded-lg font-bold hover:bg-blue-50 transition shadow-lg">Daftar Sekarang</a>
                    <a href="{{ route('spmb.cek_status') }}" class="border-2 border-white/40 text-white px-8 py-3.5 rounded-lg font-bold hover:bg-white/10 transition">Cek Status</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-sm">SP</span>
                        </div>
                        <span class="font-bold text-lg text-white">SPMB Portal</span>
                    </div>
                    <p class="text-sm">Sistem Seleksi Penerimaan Mahasiswa Baru terpercaya.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Tautan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-white transition">Panduan</a></li>
                        <li><a href="#" class="hover:text-white transition">Persyaratan</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li>info@spmb.ac.id</li>
                        <li>(021) 1234-5678</li>
                        <li>Jl. Pendidikan No. 1</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-400 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-500 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} SPMB Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
