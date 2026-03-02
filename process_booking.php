<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password is empty
$dbname = "astronomica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tour = $_POST['tour_name'];
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $guests = $_POST['guest_count'];
    $date = $_POST['booking_date'];
    $time = $_POST['booking_time'];
    $payment = $_POST['payment_method'];
    $card_no = isset($_POST['card_no']) ? $_POST['card_no'] : 'N/A';

    $sql = "INSERT INTO bookings (tour_name, full_name, email, guest_count, booking_date, booking_time, payment_method, details)
        VALUES ('$tour', '$name', '$email', '$guests', '$date', '$time', '$payment', '$card_no')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking successful for $tour!'); window.location.href='tours.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>