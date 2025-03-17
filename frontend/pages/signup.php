<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles.css"> <!-- Updated path -->
    <title>RentIn - Sign Up</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">Sign Up</h1>
        <form action="signup.php" method="POST" class="border p-4 rounded shadow mx-auto" style="max-width: 500px;">
            <div class=" form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone (optional):</label>
                <input type="text" id="phone" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_role">Role:</label>
                <select id="user_role" name="user_role" class="form-control" required>
                    <option value="tenant">Tenant</option>
                    <option value="landlord">Landlord</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
        <?php
            //include database connection
            include '../../backend/database/db.php';
            
            if(isset($_POST['submit'])){
                //Retrieve form data
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone= $_POST['phone'];
                $user_role = $_POST['user_role'];

                //hash the password for security
                $hashed_password= password_hash($password, PASSWORD_DEFAULT);
                
                //prepare SQL statement
                $sql = "INSERT INTO users (username, email, password,phone, user_role) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                //check if the statement preparation was successful
                if($stmt === false){
                    die("Error preparing statement: ". $conn->error);
                }
                
                //Bind parameters
                $stmt->bind_param("sssss", $username, $email, $hashed_password, $phone, $user_role);
                
                //Execute and check for success
                if($stmt->execute()){
                    echo "<p class='text-success text-center'>Registration successful! you can now log in.</p?";
                } else{
                    echo "<p class='text-danger text-center'>Error: ". $stmt->error . "</p>";
                }

                //close statement and connection
                $stmt->close();
                $conn->close();
            }
?>
    </div>
    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>