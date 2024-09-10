<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit;
}

include 'db.php'; 


$students = $conn->query("SELECT * FROM students");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Top header with Home, Logout buttons and "tailwebs." -->
    <header>
        <div class="header-content">
            <h1>tailwebs.</h1>
            <div class="menu">
                <a href="student_list.php" class="home-btn">Home</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="student-list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $students->fetch_assoc()): ?>
                <tr>
                    <td class="name-column">
                        <!-- Circle with the first alphabet -->
                        <div class="circle"><?= strtoupper($row['name'][0]) ?></div> 
                        <span><?= $row['name'] ?></span>
                    </td>
                    <td><?= $row['subject'] ?></td>
                    <td><?= $row['marks'] ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="dropbtn">&#x25BC;</button> <!-- Inverted arrow -->
                            <div class="dropdown-content">
                                <a href="#" onclick="editStudent(<?= $row['id'] ?>)">Edit</a>
                                <a href="#" onclick="deleteStudent(<?= $row['id'] ?>)">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        
        <button id="addButton" onclick="showAddForm()">Add Student</button> <!-- Add button moved to the left -->
    </div>


   <!-- Modal for adding/updating a student -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle">Add New Student</h2>
        <form id="addForm" action="add_student.php" method="POST">
            <div class="input-group">
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="input-group">
                <input type="text" name="subject" placeholder="Subject" required>
            </div>
            <div class="input-group">
                <input type="number" name="marks" placeholder="Marks" required>
            </div>
            <div class="form-buttons">
                <button type="submit" class="sub">Add</button>
                <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

	
	
    <script src="script.js"></script>
</body>
</html>
