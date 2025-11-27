<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch doctors for the dropdown
$doctors_sql = "SELECT doctors.id, users.full_name, doctors.specialization FROM doctors JOIN users ON doctors.user_id = users.id";
$doctors_result = $conn->query($doctors_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Book Appointment</h1>
            <a href="dashboard.php" class="text-sm text-slate-500 hover:text-slate-900">Cancel</a>
        </div>

        <form action="book_process.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Select Doctor</label>
                <select name="doctor_id" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                    <option value="">Choose a specialist...</option>
                    <?php
                    if ($doctors_result->num_rows > 0) {
                        while($row = $doctors_result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['full_name']." (".$row['specialization'].")</option>";
                        }
                    } else {
                         // Mock option if no database connection yet
                         echo "<option value='1'>Dr. Sarah Wilson (Cardiology)</option>";
                         echo "<option value='2'>Dr. James Chen (Neurology)</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Preferred Date</label>
                <input type="date" name="appointment_date" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Reason for Visit</label>
                <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none"></textarea>
            </div>

            <button type="submit" class="w-full bg-sky-600 text-white font-bold py-3 rounded-lg hover:bg-sky-700 transition shadow-lg shadow-sky-600/20">Confirm Booking</button>
        </form>
    </div>

</body>
</html>
