<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-size: cover;
        background-position: center;
    }

    .container-img {
        background-image: url("../assets/images/bg-home.jpg");
        background-size: cover;
        background-position: center;
        position: relative;
        padding: 50px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../assets/images/bg-home.jpg");
    }

    .text {
        color: white;
        text-align: center;
    }

    h4 {
        margin-top: 20px;
        font-size: 1.5rem;
        color: #333;
        text-align: center;
    }

    .testimonial {
        text-align: center;
        padding: 20px;
    }

    .carousel-inner {
        display: flex;
    }

    .carousel-item {
        flex: 1 0 auto;
        transition: transform 0.5s ease;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }
    </style>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="container-fluid">
        <div class="container-img">
            <h1 class="text">Welcome to RentIn</h1>
            <p class="text">Your trusted platform for tenant management and rent payments.</p>
            <div class=" text-center mt-5">
                <div class="auth-buttons">
                    <a href="./login.php" class="btn btn-primary">Login</a>
                    <a href="./signup.php" class="btn btn-primary">Register</a>
                </div>
                <div class="cards-container">
                    <div class="card">
                        <h3>Wide Range of Properties</h3>
                        <p>Find a variety of properties to rent, from apartments to houses.</p>
                    </div>
                    <div class="card">
                        <h3>Easy Booking</h3>
                        <p>Book your desired property with just a few clicks.</p>
                    </div>
                    <div class="card">
                        <h3>24/7 Support</h3>
                        <p>Get support anytime you need it with our 24/7 customer service.</p>
                    </div>
                </div>
            </div>
        </div>
        <section id="about-us" class="mt-5">
            <h2 class="text-center">About Us</h2>
            <p class="text-center">Learn more about our mission and values.</p>
            <div class="container-abt">


            </div>
        </section>

        <section id="gallery" class="mt-5">
            <h2 class="text-center">Gallery</h2>
            <p class="text-center">Explore our gallery to see our properties and services in action.</p>
        </section>

        <section id="contact-us" class="mt-5">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Get in touch with us for any queries or support.</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="index.php" method="POST" class="border p-4 rounded shadow mx-auto"
                        style="max-width: 500px;">
                        <div class="form-group">
                            <label for="first-name">First Name:</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="second-name">Second Name:</label>
                            <input type="text" id="secondname" name="secondname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>You can also find us on our social media pages</h4>
                    <div class="social-icons mt-3 text-center"
                        style="display: flex; justify-content: center; gap: 10px;">
                        <a href="https://linkdin.com" target="_blank" class="mr-2" style="display: inline-block;">
                            <i class="fab fa-linkedin" style="font-size:30px;"></i>
                            <p>LinkedIn</p>
                        </a>
                        <a href="https://facebook.com" target="_blank" class="mr-2" style="display: inline-block;">
                            <i class="fab fa-facebook" style="font-size:30px;"></i>
                            <p>Facebook</p>
                        </a>
                        <a href="https://whatssap.com" target="_blank" class="mr-2" style="display: inline-block;">
                            <i class="fab fa-whatsapp" style="font-size:30px;"></i>
                            <p>WhatsApp</p>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="mr-2" style="display: inline-block;">
                            <i class="fab fa-twitter" style="font-size:30px;"></i>
                            <p>Twitter</p>
                        </a>
                        <a href="https://instagram.com" target="_blank" style="display: inline-block;">
                            <i class="fab fa-instagram" style="font-size:30px;"></i>
                            <p>Instagram</p>
                        </a>
                    </div>
                    <img src="../assets/images/card-img3.jpg" alt="Contact Image" class="img-fluid rounded shadow">
                </div>
            </div>
        </section>

        <section id="testimonials" class="mt-5">
            <h2 class="text-center">Testimonials</h2>
            <p class="text-center">Hear from our satisfied customers.</p>
            <div class="container-testimonials">
                <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php  
                        // Include the database configuration file
                        include '../../backend/database/db.php';
                        // Fetch testimonials from the database  
                        $sql = "SELECT name, text, profile_picture FROM testimonials";  
                        $result = $conn->query($sql);  

                        if ($result) {  
                            $active = true;
                            while ($row = $result->fetch_assoc()) {  
                                echo "<div class='carousel-item " . ($active ? 'active' : '') . "'>";  
                                $active = false;
                                // Display profile picture  
                                echo "<img src='" . htmlspecialchars($row['profile_picture']) . "' alt='Profile Picture' style='width:50px; height:50px; border-radius:50%;'>";  
                                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";  
                                echo "<p>" . htmlspecialchars($row['text']) . "</p>";  
                                echo "</div>";  
                            }  
                        } else {  
                            echo "Error: " . $conn->error; // Catch any errors  
                        }   
                        $conn->close();  
                        ?>
                    </div>

                    <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Include Bootstrap CSS & JS (make sure you have these in your project) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>