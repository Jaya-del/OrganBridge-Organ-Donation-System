<?php
// Database connection
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'organbridge';
$port = 3307;

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$amount = $_POST['amount'];

// Insert into database
$sql = "INSERT INTO donations (name, email, amount) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssd", $name, $email, $amount);

if ($stmt->execute()) {
    // UPI details
    $upi_id = "yourupiid@okaxis"; // ⚠️ Replace with your real UPI ID
    $upi_link = "upi://pay?pa=$upi_id&pn=" . urlencode($name) . "&am=$amount&cu=INR";

    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Donation Success</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                text-align: center;
                padding: 50px;
            }
            .box {
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 500px;
                margin: auto;
            }
            img.qr {
                width: 200px;
                margin-top: 20px;
            }
            a.back-link {
                margin-top: 20px;
                display: inline-block;
                color: #333;
                text-decoration: none;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class='box'>
            <h2>Thank you, $name!</h2>
            <p>Your donation of ₹" . number_format($amount, 2) . " has been recorded successfully.</p>

            <div>
                <p>Scan the QR code below to complete your payment:</p>
                <img src='scannner1.jpg' alt='UPI QR Code' class='qr'>
            </div>

            <p><a href='donate.html' class='back-link'><strong>← Back to Donate Page</strong></a></p>
        </div>
    </body>
    </html>";
} else {
    echo "<p style='color:red;'>❌ Error saving donation. Please try again.</p>";
}

$stmt->close();
$conn->close();
?>
