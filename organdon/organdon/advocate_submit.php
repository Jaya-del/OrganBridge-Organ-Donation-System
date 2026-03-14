<?php
// Database configuration
$host = '127.0.0.1'; // safer than 'localhost' for sockets
$username = 'root';
$password = '';
$database = 'organbridge';
$port = 3307;

$conn = new mysqli($host, $username, $password, $database, $port);

// Connect to database
$conn = new mysqli($host, $username, $password, $database,$port);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form inputs
$name     = trim($_POST['name']);
$email    = trim($_POST['email']);
$phone    = trim($_POST['phone']);
$location = trim($_POST['location']);
$reason   = trim($_POST['why']);

// Validate
if (empty($name) || empty($email) || empty($phone) || empty($location) || empty($reason)) {
  die("Please fill in all fields.");
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO advocates (name, email, phone, location, reason) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $location, $reason);

if ($stmt->execute()) {
  echo "
    <div style='max-width:600px;margin:40px auto;padding:20px;text-align:center;font-family:sans-serif;border:1px solid #ddd;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.05);'>
      <h2 style='color:green;'>Thank you, $name!</h2>
      <p>You’ve successfully registered as an Advocate with <strong>OrganBridge</strong>.</p>
      <p>We truly appreciate your willingness to spread awareness and support organ donation.</p>
      <p><strong>Your Details:</strong></p>
      <ul style='list-style:none;padding:0;'>
        <li><strong>Email:</strong> $email</li>
        <li><strong>Phone:</strong> $phone</li>
        <li><strong>Location:</strong> $location</li>
      </ul>
      <p>We’ll be in touch with next steps soon!</p>
      <a href='advocate.html' style='display:inline-block;margin-top:20px;padding:10px 25px;background:#0d6efd;color:#fff;border-radius:6px;text-decoration:none;'>← Back to Advocate Page</a>
    </div>
  ";
} else {
  echo "<h2 style='color:red;text-align:center;'>Something went wrong. Please try again later.</h2>";
}

$stmt->close();
$conn->close();
?>
