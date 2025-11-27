<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <a href="index.php" class="font-bold text-xl text-sky-600">MediCare+</a>
            <div class="flex items-center gap-4">
                <span class="text-slate-600">Welcome, <b><?php echo $_SESSION['name']; ?></b></span>
                <a href="logout.php" class="text-red-500 text-sm font-medium hover:underline">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-8">Patient Dashboard</h1>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Sidebar -->
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full mx-auto mb-4 flex items-center justify-center text-2xl">👤</div>
                    <h2 class="font-bold text-lg"><?php echo $_SESSION['name']; ?></h2>
                    <p class="text-sm text-slate-500">Patient ID: #<?php echo $_SESSION['user_id']; ?></p>
                </div>
            </div>

            <!-- Main Content -->
            <div class="md:col-span-2 space-y-6">
                <!-- Appointments Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-xl">Upcoming Appointments</h3>
                        <a href="book_appointment.php" class="bg-sky-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-sky-700 transition">Book New</a>
                    </div>
                    
                    <!-- PHP Code to fetch appointments would go here -->
                    <div class="space-y-4">
                        <div class="p-4 border border-slate-100 rounded-lg flex justify-between items-center hover:bg-slate-50 transition">
                            <div>
                                <p class="font-bold text-slate-900">Dr. Sarah Wilson</p>
                                <p class="text-sm text-slate-500">Cardiology Checkup</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-900">Mar 15, 2024</p>
                                <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Confirmed</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Medical Records Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                    <h3 class="font-bold text-xl mb-6">Medical Records</h3>
                    <div class="p-4 border border-slate-100 rounded-lg">
                        <p class="text-slate-500 text-center italic">No records found.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
