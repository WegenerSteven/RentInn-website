<?php  
session_start(); // Start the session to access user information  

// Include the database connection  
include '../../backend/database/db.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    // Check if user is logged in  
    if (!isset($_SESSION['user_id'])) {  
        header("Location: login.php"); // Redirect to login if not logged in  
        exit();  
    }  

    // Retrieve user input  
    $user_id = $_SESSION['user_id']; // The logged-in user's ID  
    $name = $_POST['name'];  
    $text = $_POST['text'];  

    // Specify the correct path for the uploads directory  
    $target_dir = '../assets/uploads/'; // Adjust this path  
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);  

    // Handle the file upload for the profile picture  
    if (isset($_FILES['profile_picture'])) {  
        // Make sure the uploads directory exists  
        if (!file_exists($target_dir)) {  
            echo "Uploads directory does not exist.";  
            exit();  
        }  

        // Move uploaded file to the target directory  
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {  
            // Prepare SQL statement to insert testimonials  
            $sql = "INSERT INTO testimonials (user_id, name, text, profile_picture) VALUES (?, ?, ?, ?)";  
            $stmt = $conn->prepare($sql);  
            $stmt->bind_param("isss", $user_id, $name, $text, $target_file);  

            // Execute the statement and check for success  
            if ($stmt->execute()) {  
                header("Location: dashboard.php?success=1"); // Redirect with a success message  
                exit();  
            } else {  
                echo "Error: " . $stmt->error; // Display error if query fails  
            }  
            $stmt->close();  
        } else {  
            echo "Error uploading profile picture.";  
        }  
    } else {  
        echo "No file uploaded.";  
    }  

    // Close the database connection  
    $conn->close();  
}  
?>