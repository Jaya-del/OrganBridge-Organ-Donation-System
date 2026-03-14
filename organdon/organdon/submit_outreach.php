<?php
// Database Configuration
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'organbridge';
$port = 3307;

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Receive and sanitize form values
$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$phone    = $_POST['phone'] ?? '';
$location = $_POST['location'] ?? '';
$message  = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($phone)) {
    die("❌ Required fields missing.");
}

// Prepare and insert into outreach_partners table
$sql = "INSERT INTO outreach_partners (name, email, phone, location, message) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("❌ Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssss", $name, $email, $phone, $location, $message);

// Execute and respond
if ($stmt->execute()) {
    echo "<h2>✅ Thank you, $name! Your outreach request has been submitted.</h2>";
    echo "<a href='outreach.html'>Back to Outreach Page</a>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
