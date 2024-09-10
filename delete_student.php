<?php
include 'db.php';


$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['id'])) {
    $id = $data['id'];


    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {

        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
       
            echo json_encode(["status" => "success"]);
        } else {
     
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }


        $stmt->close();
    } else {

        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $conn->close();
} else {

    echo json_encode(["status" => "error", "message" => "No ID provided"]);
}
?>
