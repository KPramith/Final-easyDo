<?php 
session_start(); 
require_once('includes/connection.php'); 
require_once('includes/funtions.php'); 

if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$errors = array();
$user_name = '';
$email = '';
$tel_num = '';
$work_type = '';
$user_id = '';

if (isset($_GET['user_id'])) {
    // Getting the user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM workers WHERE id = {$user_id} LIMIT 1";
    
    $result_set = mysqli_query($connection, $query);
    
    if($result_set) {
        if(mysqli_num_rows($result_set) == 1) {
            // User found
            $result = mysqli_fetch_assoc($result_set);
            $user_name = $result['user_name'];
            $email = $result['email'];
            $tel_num = $result['tel_num'];
            $work_type = $result['work_type'];
        } else {
            // User not found
            header('Location: mechanical.php?err=user_not_found');
            exit();
        }
    } else {
        // Query unsuccessful
        header('Location: mechanical.php?err=query_failed');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of Mechanical</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <header>
        <div class="appname"><a href="service.php"><h2>easyDo</h2></a></div>
        <div class="loggedin">Welcome <?php echo htmlspecialchars($user_name); ?></div>
    </header>

    <main>
        <div class="profile-header">
            <h1><?php echo htmlspecialchars($user_name); ?></h1>
            <div class="profile-actions">
                <div class="pic">
                    <img src="images/icon.png" class="pimg" alt="Profile Icon">
                </div>
                <a href="mechanical.php" class="back-link">< Back to Mechanical list</a>
            </div>
        </div>

        <?php
        if(!empty($errors)){
            display_errors($errors);
        }
        ?>

        <div class="profile-container">
            <div class="profile-info">
                <div class="info-row">
                    <label>User Name:</label>
                    <span><?php echo htmlspecialchars($user_name); ?></span>
                </div>
                
                <div class="info-row">
                    <label>Email Address:</label>
                    <span><?php echo htmlspecialchars($email); ?></span>
                </div>

                <div class="info-row">
                    <label>Telephone:</label>
                    <span><?php echo htmlspecialchars($tel_num); ?></span>
                </div>

                <div class="info-row">
                    <label>Working Type:</label>
                    <span><?php echo htmlspecialchars($work_type); ?></span>
                </div>

                <div class="info-row">
                    <label>Price (1hour):</label>
                    <span>$3.50</span>
                </div>
            </div>

            <div class="button-container">
                <a href="modify-mechanical.php?user_id=<?php echo htmlspecialchars($user_id); ?>" class="button">
                    Edit Profile
                </a>
                <a href="pay.php?user_id=<?php echo htmlspecialchars($user_id); ?>" class="button">
                    Hire Worker
                </a>
            </div>
        </div>
    </main>

    <?php include('includes/footer.php'); ?>
</body>
</html>