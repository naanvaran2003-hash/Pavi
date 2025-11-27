<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, full_name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['full_name'];
            
            if($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($row['role'] == 'doctor') {
                header("Location: doctor_dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
        } else {
            $_SESSION['error'] = "Invalid password.";
            header("Location: login.php");
        }
    } else {
        $_SESSION['error'] = "No user found with this email.";
        header("Location: login.php");
    }
    $stmt->close();
}
$conn->close();
?>
