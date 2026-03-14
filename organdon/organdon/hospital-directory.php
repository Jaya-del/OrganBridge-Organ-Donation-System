<?php
$host = '127.0.0.1';    // Avoid 'localhost' to prevent socket issues
$username = 'root';
$password = '';         // Default XAMPP password is empty
$database = 'organbridge';
$port = 3307;           // Use your XAMPP MySQL port (default is 3306)

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hospitals = [];
$result = $conn->query("SELECT DISTINCT name FROM hospitals");
while ($row = $result->fetch_assoc()) {
    $hospitals[] = $row['name'];
}

$searchResult = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hospital_name'])) {
    $hospitalName = $conn->real_escape_string($_POST['hospital_name']);
    $sql = "SELECT * FROM hospitals WHERE name = '$hospitalName'";
    $searchResult = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OrganBridge Hospital Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #e8f5e9);
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 850px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: 600;
            color: #2e7d32;
        }

        label {
            font-weight: 500;
        }

        table th, table td {
            vertical-align: middle !important;
        }

        .bi {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="text-center mb-4">
        <h2><i class="bi bi-hospital-fill text-success"></i>OrganBridge: Approved Hospital Directory</h2>
        <p class="text-muted">Search for registered organ donation hospitals in India</p>
    </div>

    <div class="card p-4">
        <form method="post" class="row g-3 align-items-center">
            <div class="col-md-8">
                <label for="hospital_name" class="form-label">Select Hospital</label>
                <select name="hospital_name" id="hospital_name" class="form-select" required>
                    <option value="" disabled selected>-- Choose a hospital --</option>
                    <?php foreach ($hospitals as $name): ?>
                        <option value="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 d-grid mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
        </form>
    </div>

    <?php if ($searchResult && $searchResult->num_rows > 0): ?>
        <div class="card mt-5 p-4">
            <h5 class="mb-3 text-primary"><i class="bi bi-building-check"></i> Hospital Details</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-hospital"></i> Name</th>
                            <th><i class="bi bi-clipboard-check"></i> Reg. No</th>
                            <th><i class="bi bi-geo-alt"></i> Address</th>
                            <th><i class="bi bi-envelope-at"></i> Email</th>
                            <th><i class="bi bi-telephone"></i> Phone</th>
                            <th><i class="bi bi-heart-pulse"></i> Organs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $searchResult->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['reg_no']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['organs']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="alert alert-warning mt-4"><i class="bi bi-exclamation-triangle"></i> No results found for the selected hospital.</div>
    <?php endif; ?>
</div>
</body>
</html>
