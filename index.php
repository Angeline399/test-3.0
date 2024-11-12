<?php
// Define variables and initialize with empty values
$firstname = $lastname = $email = "";
$firstname_err = $lastname_err = $email_err = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate firstname
    if (empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please enter your firstname.";
    } else {
        $firstname = htmlspecialchars(trim($_POST["firstname"]));
    }

    // Validate lastname
    if (empty(trim($_POST["lastname"]))) {
        $lastname_err = "Please enter your lastname.";
    } else {
        $lastname = htmlspecialchars(trim($_POST["lastname"]));
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // If no errors, display success message
    if (empty($firstname_err) && empty($lastname_err) && empty($email_err)) {
        echo "<div class='alert alert-success mt-3' role='alert'>";
        echo "<strong>Success!</strong> Form submitted successfully.";
        echo "<p><strong>Firstname:</strong> $firstname</p>";
        echo "<p><strong>Lastname:</strong> $lastname</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubuntu Server PHP Deployment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>My first Ubuntu Server PHP Deployment</h1>

        <!-- Form for collecting user data -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname:</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required>
                <span class="text-danger"><?php echo $firstname_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname:</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $lastname; ?>" required>
                <span class="text-danger"><?php echo $lastname_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                <span class="text-danger"><?php echo $email_err; ?></span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
