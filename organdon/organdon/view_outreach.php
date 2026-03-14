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

// Step 2: Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Step 3: Build dynamic WHERE clause based on filters
$where = [];
if (!empty($_GET['name'])) {
    $name = $conn->real_escape_string($_GET['name']);
    $where[] = "name LIKE '%$name%'";
}
if (!empty($_GET['email'])) {
    $email = $conn->real_escape_string($_GET['email']);
    $where[] = "email LIKE '%$email%'";
}
if (!empty($_GET['location'])) {
    $location = $conn->real_escape_string($_GET['location']);
    $where[] = "location LIKE '%$location%'";
}

$sql = "SELECT id, name, email, phone, location, message, submitted_at FROM outreach_partners";
if ($where) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$sql .= " ORDER BY submitted_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Outreach Partners | View Submissions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 30px;
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    h2 {
      margin-bottom: 20px;
      color: #0d6efd;
    }
    .table {
      background-color: #fff;
    }
  </style>
</head>
<body>

  <h2>📋 Outreach Partner Submissions</h2>

  <!-- 🔍 Filter Form -->
  <form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
      <input type="text" name="name" class="form-control" placeholder="Search by Name" value="<?= htmlspecialchars($_GET['name'] ?? '') ?>">
    </div>
    <div class="col-md-3">
      <input type="text" name="email" class="form-control" placeholder="Search by Email" value="<?= htmlspecialchars($_GET['email'] ?? '') ?>">
    </div>
    <div class="col-md-3">
      <input type="text" name="location" class="form-control" placeholder="Search by Location" value="<?= htmlspecialchars($_GET['location'] ?? '') ?>">
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Apply Filters</button>
      <a href="view_outreach.php" class="btn btn-secondary">Reset</a>
    </div>
  </form>

  <!-- 📄 Result Table -->
  <?php if ($result && $result->num_rows > 0): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Location</th>
            <th>Message</th>
            <th>Submitted At</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row["id"]) ?></td>
              <td><?= htmlspecialchars($row["name"]) ?></td>
              <td><?= htmlspecialchars($row["email"]) ?></td>
              <td><?= htmlspecialchars($row["phone"]) ?></td>
              <td><?= htmlspecialchars($row["location"]) ?></td>
              <td><?= nl2br(htmlspecialchars($row["message"])) ?></td>
              <td><?= htmlspecialchars($row["submitted_at"]) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-muted">No outreach partner submissions found.</p>
  <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
