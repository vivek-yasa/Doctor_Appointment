<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab-01_wad"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $locality = mysqli_real_escape_string($conn, $_POST['locality']);
    $specialty = mysqli_real_escape_string($conn, $_POST['specialty']);
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
    $doctorName = mysqli_real_escape_string($conn, $_POST['selectedDoctor']); // Updated to 'selectedDoctor'

    $sql = "INSERT INTO appointment_bookings (name, locality, specialty, problem, date, time, contactNumber, doctorName)
            VALUES ('$name', '$locality', '$specialty', '$problem', '$date', '$time', '$contactNumber', '$doctorName')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
