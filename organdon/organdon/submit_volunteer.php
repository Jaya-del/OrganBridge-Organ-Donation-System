<?php
// Step 1: Connect to MySQL database
$host = '127.0.0.1';  // Avoid socket issues
$username = 'root';
$password = '';       // Default password
$database = 'organbridge';
$port = 3307;         // Custom port

// Step 2: Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Step 3: Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Step 4: Check if POST data exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 5: Safely receive form data
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $location = htmlspecialchars(trim($_POST['location'] ?? ''));
    $interest = htmlspecialchars(trim($_POST['interest'] ?? ''));

    // Step 6: Basic validation
    if (empty($name) || empty($email) || empty($phone)) {
        echo "<h3 style='color:red; text-align:center;'>❌ Please fill in all required fields (Name, Email, Phone).</h3>";
    } else {
        // Step 7: Prepare SQL statement
        $sql = "INSERT INTO volunteers (name, email, phone, location, interest) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssss", $name, $email, $phone, $location, $interest);

            // Step 8: Execute and respond
            if ($stmt->execute()) {
                echo "<h2 style='text-align:center; font-family:sans-serif; color:green;'>✅ Thank you for volunteering, $name!<br>Your application has been submitted.</h2>";
            } else {
                echo "<h2 style='text-align:center; font-family:sans-serif; color:red;'>❌ Submission failed. Please try again later.</h2>";
            }

            $stmt->close();
        } else {
            echo "<h3 style='color:red;'>❌ SQL Prepare Failed: " . $conn->error . "</h3>";
        }
    }
} else {
    echo "<h3 style='text-align:center; color:red;'>❌ Invalid request. Please submit the form properly.</h3>";
}

// Step 9: Close the database connection
$conn->close();
?>
