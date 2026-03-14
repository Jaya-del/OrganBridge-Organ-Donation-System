<?php
// Connect to DB
$host = 'localhost';
$username = 'root';
$password = 'suchitra';
$database = 'organbridge';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch donors
$sql = "SELECT id, name, email, phone, address, id_type, id_number, message, amount, created_at FROM donations ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Donors – OrganBridge</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 2rem;
      background-color: #f0f9ff;
    }
    table {
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }
    th {
      background-color: #0d6efd;
      color: white;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="mb-4 text-primary">All Donations</h2>

  <?php if ($result->num_rows > 0): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Amount (₹)</th>
            <th>ID Type</th>
            <th>ID Number</th>
            <th>Message</th>
            <th>Address</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $count++ ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['phone']) ?></td>
              <td><?= number_format($row['amount'], 2) ?></td>
              <td><?= $row['id_type'] ?></td>
              <td><?= $row['id_number'] ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
              <td><?= nl2br(htmlspecialchars($row['address'])) ?></td>
              <td><?= $row['created_at'] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info">No donations found.</div>
  <?php endif; ?>

  <a href="donate.html" class="btn btn-primary mt-4">← Back to Donation Page</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
