<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
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
</style>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="container-fluid">
        <div class="container-img">
            <h1 class="text">Welcome to RentIn</h1>
            <p class="text">Your trusted platform for tenant management and rent payments.</p>
            <div class=" text-center mt-5">
                <div class="auth-buttons">
                    <a href="./login.php" class="btn btn-primary">Login</a>
                    <a href="./register.php" class="btn btn-primary">Register</a>
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

        <section id="contact-us" class="mt-5">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Get in touch with us for any queries or support.</p>
        </section>

        <section id="gallery" class="mt-5">
            <h2 class="text-center">Gallery</h2>
            <p class="text-center">Explore our gallery to see our properties and services in action.</p>
        </section>

        <section id="testimonials" class="mt-5">
            <h2 class="text-center">Testimonials</h2>
            <p class="text-center">Hear from our satisfied customers.</p>
            <div class="container-testimonials">
                <div class="testimonial">
                    <p>"RentIn made finding my new apartment so easy and stress-free!" - Jane Doe</p>
                </div>
                <div class="testimonial">
                    <p>"The customer service is excellent. Highly recommend!" - John Smith</p>
                </div>
            </div>
        </section>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>