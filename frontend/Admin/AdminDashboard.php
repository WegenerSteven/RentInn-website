<?php  
session_start(); // Start the session  

// Include database connection  
include '../../backend/database/db.php';  

// Check if user is logged in and is an admin  
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'landlord') {  
    header("Location: ../pages/login.php"); // Redirect to login if not logged in or not an admin  
    exit();  
}  

// Retrieve user info from session  
$user_id = $_SESSION['user_id'];  
$username = $_SESSION['username']; // Assume this is stored in the session  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RentIn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header class="bg-light text-center py-3">
        <h1>Admin Dashboard</h1>
        <h4>Welcome, <?php echo htmlspecialchars($username); ?>!</h4>
        <a href="../pages/logout.php" class="btn btn-danger">Logout</a>
    </header>

    <div class="container mt-5">
        <h2>Manage Tenants</h2>
        <a href="./tenant_manage.php" class="btn btn-primary mb-3">View All Tenants</a>
        <p>You can manage tenants, view their testimonials, and more.</p>
    </div>

    <?php include '../includes/footer.php'; ?>
    <!-- Include footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>