// Function to show the add modal
function showAddForm() {
    document.getElementById('addModal').style.display = 'block';
}

// Function to close the modal
function closeModal() {
    document.getElementById('addModal').style.display = 'none';
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('addModal');
    if (event.target == modal) {
        closeModal();
    }
}

function deleteStudent(id) {
    if (confirm('Are you sure you want to delete this student?')) {
        fetch('delete_student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.reload(); // Refresh the page after successful deletion
            } else {
                alert('Failed to delete the student: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the student');
        });
    }
}



function editStudent(id) {
    fetch(`get_student.php?id=${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(student => {
            // Ensure student data is in the expected format
            if (!student || student.error) {
                throw new Error(student.error || 'Invalid student data');
            }
            
            document.querySelector('#addModal input[name="name"]').value = student.name;
            document.querySelector('#addModal input[name="subject"]').value = student.subject;
            document.querySelector('#addModal input[name="marks"]').value = student.marks;

            const form = document.querySelector('#addForm');
            form.action = 'update_student.php';

            // Remove any existing hidden input with name 'id'
            const existingHiddenInput = form.querySelector('input[name="id"]');
            if (existingHiddenInput) {
                existingHiddenInput.remove();
            }

            // Add a new hidden input to pass the student ID
            let hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'id';
            hiddenInput.value = id; // Use the passed ID directly
            form.appendChild(hiddenInput);

            // Update modal title
            document.getElementById('modalTitle').innerText = 'Edit Student';

            // Show the modal
            showAddForm();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while fetching student data: ' + error.message);
        });
}
