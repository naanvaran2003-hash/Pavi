<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

// Fetch doctors
$doctors_sql = "SELECT * FROM doctors JOIN users ON doctors.user_id = users.id";
$doctors_result = $conn->query($doctors_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Plus - Doctors</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <a href="index.php" class="font-bold text-xl text-sky-600">MediCare+</a>
            <div class="flex items-center gap-4">
                <a href="dashboard.php" class="text-sm font-medium text-slate-600 hover:text-sky-600">Dashboard</a>
                <a href="logout.php" class="text-red-500 text-sm font-medium hover:underline">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-slate-900 mb-8">Our Specialists</h1>

        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            if ($doctors_result->num_rows > 0) {
                while($doctor = $doctors_result->fetch_assoc()) {
            ?>
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition">
                <div class="h-48 bg-slate-200 relative">
                    <img src="<?php echo $doctor['image_url'] ? $doctor['image_url'] : 'assets/images/portrait_of_a_friendly_male_doctor.png'; ?>" alt="Doctor" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg"><?php echo $doctor['full_name']; ?></h3>
                    <p class="text-sm text-sky-600 font-medium mb-2"><?php echo $doctor['specialization']; ?></p>
                    <p class="text-xs text-slate-500 mb-4"><?php echo $doctor['experience_years']; ?> Years Experience</p>
                    
                    <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                        <span class="font-bold text-slate-900">$<?php echo $doctor['consultation_fee']; ?></span>
                        <a href="book_appointment.php?doctor_id=<?php echo $doctor['id']; ?>" class="bg-sky-600 text-white px-3 py-1.5 rounded text-sm hover:bg-sky-700 transition">Book</a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                // Mock Data for display if DB is empty
                for($i=1; $i<=4; $i++) {
            ?>
             <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition">
                <div class="h-48 bg-slate-200 relative">
                    <img src="assets/images/portrait_of_a_friendly_male_doctor.png" alt="Doctor" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg">Dr. John Doe</h3>
                    <p class="text-sm text-sky-600 font-medium mb-2">Cardiologist</p>
                    <p class="text-xs text-slate-500 mb-4">10 Years Experience</p>
                    
                    <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                        <span class="font-bold text-slate-900">$150</span>
                        <a href="book_appointment.php" class="bg-sky-600 text-white px-3 py-1.5 rounded text-sm hover:bg-sky-700 transition">Book</a>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

</body>
</html>
