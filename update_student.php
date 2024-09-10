<?php
include 'db.php';

header('Content-Type: application/json'); // Set the content type to JSON

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['marks'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $sql = "UPDATE students SET name = ?, subject = ?, marks = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('ssii', $name, $subject, $marks, $id);

        if ($stmt->execute()) {
            header('Location: student_list.php');
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Missing parameters"]);
}
?>
