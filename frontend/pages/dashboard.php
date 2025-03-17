<!-- pages/dashboard.php -->
<?php  
//check if session is active
if (session_start() == PHP_SESSION_NONE){
    session_start();    
} // Start the session to access session variables  

// Check if the user is logged in  
if (!isset($_SESSION['user_id'])) {  
    header("Location: login.php"); // Redirect to login if not logged in  
    exit();  
}  

// Include database connection  
include '../../backend/database/db.php';  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>RentIn - Dashboard</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="container mt-5">
        <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>You are logged in as a <?php echo htmlspecialchars($_SESSION['user_role']); ?>.</p>

        <a href="logout.php" class="btn btn-danger">Logout</a>
        <!-- Logout Button -->
    </div>
    <form action="submit_testimonial.php" method="POST" enctype="multipart/form-data" class="container mt-3 mb-5"
        style="max-width: 800px;">
        <div class="alert alert-info">
            <p>Share your experience with RentIn by submitting a testimonial below.</p>
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="text">Your Testimonial:</label>
                <textarea id="text" name="text" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Testimonial</button>
    </form>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>