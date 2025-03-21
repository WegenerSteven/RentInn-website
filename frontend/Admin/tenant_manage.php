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

// Fetch all tenant details  
$tenant_sql = "SELECT user_id, username, email, phone FROM users WHERE user_role = 'tenant'";  
$tenant_result = $conn->query($tenant_sql);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tenants - RentIn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <header class="bg-light text-center py-3">
    </header>

    <div class="container mt-5">
        <h2 class="text-center">Manage Tenants</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tenant_result->num_rows > 0): ?>
                <?php while($row = $tenant_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <a href="update_tenant.php?id=<?php echo $row['user_id']; ?>"
                            class="btn btn-warning btn-sm">Update</a>
                        <a href="delete_tenant.php?id=<?php echo $row['user_id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this tenant?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No tenants found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>