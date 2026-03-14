<?php
// Database configuration
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'organbridge';
$port = 3307;

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
$fullName         = trim($_POST['fullName'] ?? '');
$parentName       = trim($_POST['parentName'] ?? '');
$address          = trim($_POST['address'] ?? '');
$address2         = trim($_POST['address2'] ?? '');
$city             = trim($_POST['city'] ?? '');
$state            = trim($_POST['state'] ?? '');
$pincode          = trim($_POST['pincode'] ?? '');
$mobile           = trim($_POST['mobile'] ?? '');
$email            = trim($_POST['email'] ?? '');
$dob              = trim($_POST['dob'] ?? '');
$age              = trim($_POST['age'] ?? '');
$gender           = trim($_POST['gender'] ?? '');
$bloodGroup       = trim($_POST['bloodGroup'] ?? '');
$emergencyName    = trim($_POST['emergencyName'] ?? '');
$emergencyContact = trim($_POST['emergencyContact'] ?? '');
$socialLink       = trim($_POST['socialLink'] ?? '');
$referral         = trim($_POST['referral'] ?? '');
$organs           = $_POST['organs'] ?? [];
$declaration      = isset($_POST['declaration']) ? 1 : 0;

// Validation
if (empty($fullName) || empty($parentName) || empty($address) || empty($city) || empty($state) || empty($pincode) || empty($mobile) || empty($email) || empty($dob) || empty($age) || empty($gender) || empty($bloodGroup) || empty($emergencyName) || empty($emergencyContact) || empty($referral) || empty($organs) || !$declaration) {
  die("Please fill in all required fields and agree to the declaration.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email address.");
}

// Prepare data
$organList = implode(", ", $organs);
$fullAddress = $address . ($address2 ? ", $address2" : '');

// Prepare SQL
$stmt = $conn->prepare("INSERT INTO organ_pledges (full_name, parent_name, address, city, state, pincode, mobile, email, dob, age, gender, blood_group, emergency_name, emergency_contact, organs, social_link, referral_source, declaration, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

$stmt->bind_param("sssssssssssssssssi",
  $fullName,
  $parentName,
  $fullAddress,
  $city,
  $state,
  $pincode,
  $mobile,
  $email,
  $dob,
  $age,
  $gender,
  $bloodGroup,
  $emergencyName,
  $emergencyContact,
  $organList,
  $socialLink,
  $referral,
  $declaration
);

// Show thank you HTML page on success
if ($stmt->execute()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pledge Submitted</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f8ff;
      font-family: Arial, sans-serif;
    }
    .thankyou-box {
      max-width: 600px;
      margin: 100px auto;
      padding: 40px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    .thankyou-box h2 {
      color: #198754;
      font-weight: bold;
    }
    .thankyou-box p {
      font-size: 1.1rem;
      margin-top: 15px;
    }
    .btn-home {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="thankyou-box">
    <h2>Thank you, <?= htmlspecialchars($fullName) ?>!</h2>
    <p>Your organ donation pledge has been successfully submitted.</p>
    <p>We truly appreciate your generosity and commitment to saving lives.</p>
    <p>You will receive updates and confirmation shortly via email.</p>
    <a href="index.html" class="btn btn-success btn-home">Return to Home</a>
  </div>
</body>
</html>
<?php
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
