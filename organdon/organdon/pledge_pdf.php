<?php
session_start();

if (!isset($_SESSION['pledge'])) {
  die("No data found. Please submit the pledge form first.");
}

$data = $_SESSION['pledge'];
$filename = "Organ_Pledge_" . preg_replace('/\s+/', '_', $data['fullName']) . ".doc";

// Output headers for Word-like download
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=$filename");

echo "<html><body>";
echo "<h2 style='text-align:center;'>Organ Donation Pledge</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0' width='100%'>";
foreach ($data as $key => $value) {
  $label = ucwords(str_replace("_", " ", $key));
  echo "<tr><td><strong>$label</strong></td><td>$value</td></tr>";
}
echo "</table>";
echo "<p style='margin-top:20px;'>I hereby declare my consent to donate the above organs after death for medical use.</p>";
echo "<p>Date: " . date('d-m-Y') . "</p>";
echo "<p>Signature: _____________________</p>";
echo "</body></html>";

// Clean up session
unset($_SESSION['pledge']);
?>
