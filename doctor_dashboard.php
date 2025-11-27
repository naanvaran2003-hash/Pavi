<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'doctor') {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

$doctor_user_id = $_SESSION['user_id'];
// Get doctor profile ID
$doctor_profile = $conn->query("SELECT id FROM doctors WHERE user_id = '$doctor_user_id'")->fetch_assoc();
$doctor_id = $doctor_profile ? $doctor_profile['id'] : 0;

// Fetch appointments
$appointments_sql = "SELECT appointments.*, users.full_name as patient_name 
                     FROM appointments 
                     JOIN users ON appointments.patient_id = users.id 
                     WHERE appointments.doctor_id = '$doctor_id' 
                     ORDER BY appointment_date ASC";
$appointments_result = $conn->query($appointments_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - MediCare Plus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <div class="font-bold text-xl text-sky-600 flex items-center gap-2">
                MediCare+ <span class="text-slate-400 font-normal text-sm">| Doctor Portal</span>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-slate-600 font-medium">Dr. <?php echo $_SESSION['name']; ?></span>
                <a href="logout.php" class="text-red-500 text-sm font-medium hover:underline">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-slate-900">My Schedule</h1>
            <button class="bg-sky-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-sky-700 transition">Update Availability</button>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <?php if ($appointments_result && $appointments_result->num_rows > 0) { ?>
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Time</th>
                        <th class="px-6 py-3">Patient Name</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Notes</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php while($appt = $appointments_result->fetch_assoc()) { ?>
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-bold text-slate-900">
                            <?php echo date('M d, Y - h:i A', strtotime($appt['appointment_date'])); ?>
                        </td>
                        <td class="px-6 py-4 font-medium"><?php echo $appt['patient_name']; ?></td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold uppercase"><?php echo $appt['status']; ?></span>
                        </td>
                        <td class="px-6 py-4 text-slate-500 truncate max-w-xs"><?php echo $appt['notes']; ?></td>
                        <td class="px-6 py-4">
                            <button class="text-sky-600 font-medium hover:underline">View Details</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div class="p-12 text-center text-slate-500">
                    <p class="text-lg mb-2">No appointments scheduled.</p>
                    <p class="text-sm">Your upcoming appointments will appear here.</p>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>
