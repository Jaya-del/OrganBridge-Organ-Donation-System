<?php
// Database Configuration
$host = '127.0.0.1';    // Avoid 'localhost' to prevent socket issues
$username = 'root';
$password = '';         // Default XAMPP password is empty
$database = 'organbridge';
$port = 3307;           // Use your XAMPP MySQL port (default is 3306)

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if (
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['subject']) &&
    isset($_POST['message'])
) {
    // Collect and sanitize
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        die("All fields are required.");
    }

    // Prepare and execute insert query
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "
            <div style='max-width:600px;margin:50px auto;text-align:center;font-family:sans-serif;'>
                <h2 style='color:green;'>Thank you, $name!</h2>
                <p>Your message has been submitted successfully.</p>
                <a href='contact.html' style='margin-top:20px;display:inline-block;background:#0d6efd;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;'>← Back to Contact Page</a>
            </div>
        ";
    } else {
        echo "<h2 style='color:red;text-align:center;'>Submission failed. Please try again later.</h2>";
    }

    $stmt->close();
} else {
    echo "
        <h2 style='text-align:center;color:red;font-family:sans-serif;'>All fields are required.</h2>
        <p style='text-align:center;'><a href='contact.html' style='color:#0d6efd;'>← Back to Contact Page</a></p>
    ";
}

$conn->close();
?>
