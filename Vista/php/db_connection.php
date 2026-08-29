<?php
$conn = new mysqli("sql305.infinityfree.com", "if0_42146439", "94Bgpa6JaIfmir", "if0_42146439_db_connection");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
