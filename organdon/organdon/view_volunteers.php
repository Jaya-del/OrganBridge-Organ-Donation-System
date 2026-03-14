<?php
// Step 1: Connect to the database
$servername = "localhost";
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'organbridge';
$port = 3307;

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database, $port);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM volunteers ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Volunteer Submissions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2f6fc;
      padding: 40px 20px;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.08);
    }
    h2 {
      text-align: center;
      color: #0d6efd;
      margin-bottom: 30px;
    }
    table {
      border-radius: 8px;
      overflow: hidden;
    }
    thead {
      background-color: #0d6efd;
      color: #fff;
    }
    tbody tr:nth-child(even) {
      background-color: #f9fbff;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Volunteer Submissions</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Location</th>
            <th>Interest</th>
            <th>Submitted At</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $count++ ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['phone']) ?></td>
              <td><?= htmlspecialchars($row['location']) ?></td>
              <td><?= htmlspecialchars($row['interest']) ?></td>
              <td><?= $row['submitted_at'] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-center text-muted">No volunteer entries yet.</p>
  <?php endif; ?>

</div>

</body>
</html>

<?php
$conn->close();
?>
