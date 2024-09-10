<?php
include 'db.php'; 

header('Content-Type: application/json'); 


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT name, subject, marks FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
 
        echo json_encode(['error' => 'Failed to prepare the SQL statement']);
        exit;
    }

    $stmt->bind_param('i', $id); 

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
   
            $student = $result->fetch_assoc();
            echo json_encode($student);
        } else {
           
            echo json_encode(['error' => 'Student not found']);
        }
    } else {

        echo json_encode(['error' => 'Failed to execute the SQL statement']);
    }

    $stmt->close(); 
} else {

    echo json_encode(['error' => 'ID not provided']);
}

$conn->close(); 
?>
