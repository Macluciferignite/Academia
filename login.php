<?php
// Assuming you have established a database connection
$servername = "localhost:3306"; // Replace with your database server name or IP address
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "project1"; // Replace with the name of the database you created

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password_attempt = isset($_POST["password"]) ? $_POST["password"] : '';

    // Retrieve user data based on the provided email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password_attempt, $row['password'])) {
            // Password is correct, perform login actions
            // For example, you can set session variables
            // and then redirect to the dashboard
            session_start();
            $_SESSION['user_email'] = $email; // Set a session variable with the user's email

            header("Location: dashboard.html");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}

// Close the database connection
mysqli_close($connection);
?>
