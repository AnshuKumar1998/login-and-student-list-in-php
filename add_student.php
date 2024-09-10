<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $check = $conn->prepare("SELECT * FROM students WHERE name=? AND subject=?");
    $check->bind_param('ss', $name, $subject);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {

        $stmt = $conn->prepare("UPDATE students SET marks = marks + ? WHERE name=? AND subject=?");
        $stmt->bind_param('iss', $marks, $name, $subject);
    } else {
  
        $stmt = $conn->prepare("INSERT INTO students (name, subject, marks) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $name, $subject, $marks);
    }

    if ($stmt->execute()) {
        header('Location: student_list.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
