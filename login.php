<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Plus - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-900">Welcome Back</h1>
            <p class="text-slate-500">Sign in to access your dashboard</p>
        </div>

        <?php
        session_start();
        if(isset($_SESSION['error'])) {
            echo '<div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-4 border border-red-100">'.$_SESSION['error'].'</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form action="login_process.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent outline-none transition">
            </div>
            
            <button type="submit" class="w-full bg-sky-600 text-white font-bold py-3 rounded-lg hover:bg-sky-700 transition shadow-lg shadow-sky-600/20">Sign In</button>
        </form>

        <div class="mt-6 text-center text-sm text-slate-500">
            Don't have an account? <a href="register.php" class="text-sky-600 font-semibold hover:underline">Create one</a>
        </div>
        <div class="mt-4 text-center">
            <a href="index.php" class="text-xs text-slate-400 hover:text-slate-600">Back to Home</a>
        </div>
    </div>

</body>
</html>
