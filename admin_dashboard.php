<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

// Fetch stats
$total_patients = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='patient'")->fetch_assoc()['count'];
$total_doctors = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='doctor'")->fetch_assoc()['count'];
$total_appointments = $conn->query("SELECT COUNT(*) as count FROM appointments")->fetch_assoc()['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MediCare Plus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50">

    <nav class="bg-slate-900 text-white shadow-md">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <div class="font-bold text-xl flex items-center gap-2">
                <span class="bg-sky-600 text-white px-2 py-1 rounded text-sm">ADMIN</span>
                MediCare+
            </div>
            <div class="flex items-center gap-4">
                <span class="text-slate-300 text-sm">Logged in as Admin</span>
                <a href="logout.php" class="bg-red-600 px-3 py-1 rounded text-xs font-bold hover:bg-red-700 transition">LOGOUT</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">System Overview</h1>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-sky-500">
                <h3 class="text-slate-500 text-sm font-bold uppercase">Total Patients</h3>
                <p class="text-3xl font-bold text-slate-900 mt-2"><?php echo $total_patients; ?></p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-green-500">
                <h3 class="text-slate-500 text-sm font-bold uppercase">Active Doctors</h3>
                <p class="text-3xl font-bold text-slate-900 mt-2"><?php echo $total_doctors; ?></p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 border-l-4 border-l-purple-500">
                <h3 class="text-slate-500 text-sm font-bold uppercase">Appointments</h3>
                <p class="text-3xl font-bold text-slate-900 mt-2"><?php echo $total_appointments; ?></p>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h3 class="font-bold text-slate-800">Recent Users</h3>
                <button class="text-sky-600 text-sm font-medium hover:underline">View All</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Role</th>
                            <th class="px-6 py-3">Joined</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php
                        $users = $conn->query("SELECT * FROM users ORDER BY created_at DESC LIMIT 5");
                        while($user = $users->fetch_assoc()) {
                            $role_color = $user['role'] == 'admin' ? 'bg-red-100 text-red-700' : ($user['role'] == 'doctor' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700');
                        ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium">#<?php echo $user['id']; ?></td>
                            <td class="px-6 py-4 font-bold text-slate-900"><?php echo $user['full_name']; ?></td>
                            <td class="px-6 py-4"><?php echo $user['email']; ?></td>
                            <td class="px-6 py-4">
                                <span class="<?php echo $role_color; ?> px-2 py-1 rounded text-xs font-bold uppercase"><?php echo $user['role']; ?></span>
                            </td>
                            <td class="px-6 py-4 text-slate-500"><?php echo date('M d, Y', strtotime($user['created_at'])); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
