<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Plus - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50 text-slate-900">

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-2 font-bold text-xl text-sky-600">
                <div class="bg-sky-100 p-1 rounded">
                    <img src="assets/images/logo_for_medicare_plus.png" alt="Logo" class="h-8 w-8">
                </div>
                <span class="text-slate-900">MediCare</span>Plus
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="index.php" class="hover:text-sky-600 transition">Home</a>
                <a href="services.php" class="hover:text-sky-600 transition">Services</a>
                <a href="doctors.php" class="hover:text-sky-600 transition">Doctors</a>
                <a href="login.php" class="hover:text-sky-600 transition">Login</a>
                <a href="register.php" class="bg-sky-600 text-white px-4 py-2 rounded-lg hover:bg-sky-700 transition shadow-lg shadow-sky-600/20">Register Now</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-20 pb-32 overflow-hidden">
        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8 relative z-10">
                <span class="inline-block bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase">New: Online Consultations</span>
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    Healthcare that <span class="text-sky-600">Cares</span> for You
                </h1>
                <p class="text-lg text-slate-600 leading-relaxed max-w-lg">
                    Experience world-class medical care with our team of expert doctors and state-of-the-art facilities. Book appointments online with ease.
                </p>
                <div class="flex gap-4">
                    <a href="login.php" class="bg-sky-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-sky-700 transition shadow-xl shadow-sky-600/20">Book Appointment</a>
                    <a href="doctors.php" class="bg-white text-slate-700 border border-slate-200 px-8 py-3 rounded-lg font-semibold hover:bg-slate-50 transition">Find a Doctor</a>
                </div>
            </div>
            <div class="relative z-10">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="assets/images/modern_hospital_building_exterior_with_blue_sky.png" alt="Hospital" class="w-full h-auto object-cover">
                    <div class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur p-4 rounded-xl shadow-lg border border-white/50 flex items-center gap-4">
                        <div class="bg-green-100 p-2 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900">4.9/5 Rating</p>
                            <p class="text-xs text-slate-500">Based on 12,000+ patient reviews</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Our Medical Services</h2>
                <p class="text-slate-500">Comprehensive care for you and your family.</p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Service Item -->
                <div class="p-6 border border-slate-100 rounded-2xl hover:shadow-lg transition hover:border-sky-100 group">
                    <div class="w-12 h-12 bg-sky-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-sky-600 transition">
                        <img src="assets/images/cardiology_service_icon.png" class="w-8 h-8 object-contain group-hover:brightness-0 group-hover:invert transition">
                    </div>
                    <h3 class="font-bold text-lg mb-2">Cardiology</h3>
                    <p class="text-sm text-slate-500 mb-4">Comprehensive heart care including diagnostics and surgery.</p>
                    <a href="services.php" class="text-sky-600 text-sm font-semibold hover:underline">Learn more &rarr;</a>
                </div>
                <!-- Service Item -->
                 <div class="p-6 border border-slate-100 rounded-2xl hover:shadow-lg transition hover:border-sky-100 group">
                    <div class="w-12 h-12 bg-sky-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-sky-600 transition">
                        <svg class="w-6 h-6 text-sky-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Pediatrics</h3>
                    <p class="text-sm text-slate-500 mb-4">Specialized medical care for infants, children, and adolescents.</p>
                    <a href="services.php" class="text-sky-600 text-sm font-semibold hover:underline">Learn more &rarr;</a>
                </div>
                <!-- More items would go here -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-12 border-t border-slate-800">
        <div class="container mx-auto px-6 text-center md:text-left">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4"><span class="text-sky-500">MediCare</span>Plus</h3>
                    <p class="text-slate-400 text-sm">Your trusted partner in health.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="index.php" class="hover:text-white">Home</a></li>
                        <li><a href="services.php" class="hover:text-white">Services</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-slate-800 text-center text-slate-500 text-sm">
                &copy; 2025 MediCare Plus. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
