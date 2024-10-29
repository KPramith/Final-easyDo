<?php  session_start(); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="css/style.css">

<main>

        <section class="home">
            <div class="home-content">

                <!-- WELCOME TEXT-->
            <?php
            
                if (!isset($_SESSION['user_id'])) {
                    header("Location: index.php"); // Redirect to login if not logged in
                   
                }

                // Display the user name or other user details
                echo "Welcome, " . $_SESSION['user_name'] . " ! ";
                ?>
            
                <h1>Building Your Future</h1>
                <p>Quality Construction Services for Your Needs</p>
                <a href="login.html" class="btn">Log In</a>
            </div>
        </section>
        
    </main>0

    <?php include('includes/footer.php'); ?>

