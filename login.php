<?php
session_start();
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authentication query
    $stmt = $conn->prepare("SELECT * FROM teachers WHERE username=? AND password=?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: student_list.php');
    } else {
        echo "<p id='error-msg'>Invalid credentials. Please try again.</p>";
    }
}
?>
