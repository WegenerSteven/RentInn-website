<!-- pages/login.php -->
<?php
session_start(); // Start the session to track user login

//include database connection
include '../../backend/database/db.php';

if(isset($_POST ['submit'])){
    //retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //prepare SQL statment to select user

    $sql = 'SELECT user_id, password, user_role FROM users WHERE username = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows >0){
        //user found, fetch data
        $row = $result->fetch_assoc();
        
        //verify password
        if(password_verify($password, $row['password'])){
            //password is correct, set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $row['user_role'];

            //redirect based on user role
            if ($row['user_role'] === 'landlord') {
                header('Location: ../Admin/AdminDashboard.php');
            } else {
                header('Location: dashboard.php');
            }
            exit();
        } else{
            echo "<script>
            alert('Invalid password!');
            window.location.href = 'login.php';
            </script>";
        }
    } else{
        echo"<script>
        alert('No user found with that username!');
        window.location.href = 'login.php';
        </script>";
    }

    //close statement and connection
    $stmt->close();
    $conn->close();
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>RentIn - Login</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <form action="login.php" method="POST" class="border p-4 rounded shadow mx-auto" style="max-width: 400px;">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>