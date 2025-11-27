<?php
include 'db_connect.php';

// Fetch services
$services_sql = "SELECT * FROM services";
$services_result = $conn->query($services_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Plus - Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-slate-50">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <a href="index.php" class="font-bold text-xl text-sky-600">MediCare+</a>
            <div class="flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="index.php" class="hover:text-sky-600 transition">Home</a>
                <a href="doctors.php" class="hover:text-sky-600 transition">Doctors</a>
                <a href="login.php" class="bg-sky-600 text-white px-4 py-2 rounded-lg hover:bg-sky-700 transition">Login</a>
            </div>
        </div>
    </nav>

    <div class="bg-slate-900 text-white py-16 text-center">
        <h1 class="text-4xl font-bold mb-4">Our Medical Services</h1>
        <p class="text-slate-400 max-w-2xl mx-auto">We provide a wide range of specialized medical services to cater to all your health needs.</p>
    </div>

    <div class="container mx-auto px-6 py-16">
        <div class="grid md:grid-cols-2 gap-8">
            <?php
            if ($services_result->num_rows > 0) {
                while($service = $services_result->fetch_assoc()) {
            ?>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-slate-100 flex gap-6 hover:shadow-lg transition">
                <div class="w-16 h-16 bg-sky-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <img src="assets/images/cardiology_service_icon.png" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2"><?php echo $service['name']; ?></h3>
                    <p class="text-slate-500 mb-4"><?php echo $service['description']; ?></p>
                    <a href="doctors.php" class="text-sky-600 font-medium hover:underline">Find Specialists &rarr;</a>
                </div>
            </div>
            <?php
                }
            } else {
                // Mock Data
                 $mock_services = [
                    ['name' => 'Cardiology', 'desc' => 'Heart and cardiovascular system care'],
                    ['name' => 'Neurology', 'desc' => 'Disorders of the nervous system'],
                    ['name' => 'Pediatrics', 'desc' => 'Medical care for infants, children, and adolescents'],
                    ['name' => 'Orthopedics', 'desc' => 'Care for bones, joints, ligaments, and muscles']
                 ];
                 foreach($mock_services as $svc) {
            ?>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-slate-100 flex gap-6 hover:shadow-lg transition">
                <div class="w-16 h-16 bg-sky-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <img src="assets/images/cardiology_service_icon.png" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2"><?php echo $svc['name']; ?></h3>
                    <p class="text-slate-500 mb-4"><?php echo $svc['desc']; ?></p>
                    <a href="doctors.php" class="text-sky-600 font-medium hover:underline">Find Specialists &rarr;</a>
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
