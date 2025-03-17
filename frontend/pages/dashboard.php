<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentIn - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <main class="container mt-5">
        <h1 class="text-center">Dashboard</h1>
        <p class="text-center">Welcome to your dashboard.</p>
        <section id="payments" class="mt-5">
            <h2 class="text-center">Payments</h2>
            <p class="text-center">Manage your payments here.</p>
        </section>
        <section id="reports" class="mt-5">
            <h2 class="text-center">Reports</h2>
            <p class="text-center">View your reports here.</p>
        </section>
        <section id="feedback" class="mt-5">
            <h2 class="text-center">Feedback</h2>
            <p class="text-center">View and provide feedback here.</p>
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>