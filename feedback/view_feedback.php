<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default username for XAMPP/WAMP
$password = ""; // Default password for XAMPP/WAMP
$dbname = "campaign_feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Feedback Records</h2>";
    echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Submission Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . ($row['name'] ?? 'N/A') . "</td>";
        echo "<td>" . ($row['email'] ?? 'N/A') . "</td>";
        echo "<td>" . ($row['feedback'] ?? 'No feedback provided') . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "<td>" . $row['submission_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No feedback records found.";
}

// Close connection
$conn->close();
?>