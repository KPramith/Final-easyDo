<?php
session_start();
require_once('includes/connection.php'); // Include the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Library -->
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and make sure keys exist
    $email = isset($_POST['emailL']) ? trim($_POST['emailL']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Check if email and password are not empty
    if (!empty($email) && !empty($password)) {
        // Prepare a SQL query to find the user by email
        $query = "SELECT * FROM Workers WHERE email = ? AND is_deleted = 0";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the user record
            $user = $result->fetch_assoc();

            // Directly compare plain text passwords
            if ($password === $user['password']) {
                // Set session variables for the logged-in user
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];

                // Update last login timestamp
                $update_query = "UPDATE workers SET last_login = NOW() WHERE id = ?";
                $stmt_update = $connection->prepare($update_query);
                $stmt_update->bind_param("i", $user['id']);
                $stmt_update->execute();
                $stmt_update->close();

                // Redirect to dashboard or homepage
                echo "<script>window.location.href='index.php';</script>";
                exit();
            } else {
                echo "<script>Swal.fire('Login Failed', 'Incorrect password.', 'error');</script>";
            }
        } else {
            echo "<script>Swal.fire('Login Failed', 'No user found with this email.', 'error');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>Swal.fire('Login Error', 'Please enter both email and password.', 'warning');</script>";
    }
}

// Close the connection
$connection->close();
?>
</body>




</html>
