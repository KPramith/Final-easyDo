<?php session_start(); ?>
<?php require_once('includes/connection.php'); ?>
<?php 

    $errors = array();

    $username = '';
    $nic      = '';
    $email    = '';
    $tno      = '';
    $work_type = '';
    $password = '';
    
    if(isset($_POST['submit'])){

        $username  = $_POST['username'];
        $nic       = $_POST['nic'];
        $email     = $_POST['email'];
        $tno       = $_POST['tno'];
        $work_type = $_POST['work_type'];
        $password  = $_POST['password'];

        
    //cheaking if email address alredy exists

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM workers WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
       if  (mysqli_num_rows($result_set) == 1){
           $errors[] ='Email Address Already Exists.';
       }
    }


    if (empty($errors)){
        //no errors found...adding record
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $nic      = mysqli_real_escape_string($connection, $_POST['nic']);
        $email    = mysqli_real_escape_string($connection, $_POST['email']);
        $tno      = mysqli_real_escape_string($connection, $_POST['tno']);
        $work_type= mysqli_real_escape_string($connection, $_POST['work_type']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        //email already sanitized


        $query = "INSERT INTO workers (user_name, nic, email, tel_num, work_type, password, is_deleted) ";
        $query .= "VALUES ('{$username}', '{$nic}', '{$email}', '{$tno}', '{$work_type}', '{$password}', 0)";
        

        $result = mysqli_query($connection, $query);
    }
    if($result){
        //query successful...redirection to user page
       
     
        header('Location: login.html?user_added=true');
    }else {
        $errors[] = 'Failed To add the new record';
    }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singin</title>
    
    <link rel="stylesheet" href="css/singin.css">
    <style>
        select{
            padding: .5rem 1rem;
            outline: none;
            font-size:1rem;
            width: 370px;
            height:25px;
            cursor:pointer;
            box-sizing:content-box;
            color:#182733;
           border-radius: 6px;
           border:2px solid #182733;
           background: transparent;
           backdrop-filter: blur(20px);

        }
    </style>
   
</head>
<body>

<div class="wrapper"> 
<?php
        if(!empty($errors)){
            echo'<div class="errmsg">';
            echo'<b>There were errors on your form.</b><br>';
            foreach ($errors as $error) {
                echo $error.'<br>';
            }
            echo'</div>';
        }
    ?>
        <!-- Registration Form -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form id="regForm" method="post" action="singin.php" onsubmit="return validateRegistrationForm()">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input name="username" type="text" id="username" <?php echo 'value="' .$username . '"'; ?>>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input name="email" type="email" id="email" <?php echo 'value="' .$email . '"'; ?>>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                    <input name="nic" type="text" id="nic" <?php echo 'value="' .$nic . '"'; ?>>
                    <label>NIC</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input name="tno" type="text" id="tno" <?php echo 'value="' .$tno . '"'; ?>>
                    <label>Tell No</label>
                </div>
                <div class="work-type">
                    <select name="work_type" id="work_type">
                        <option value="">Select Your Work Type</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="Carpentry">Carpentry</option>
                        <option value="Construction">Construction</option>
                        <option value="Plumbing">Plumbing</option>
                       
                    </select>
                </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input name="password" type="password" id="password" >
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" id="terms"> I agree to the terms & conditions</label>
                </div>
                <button type="submit" name="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>
                        Already have an account? 
                        <a href="login.html" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
 
<!--<script src="javascrpt/scrypt.js"></script> -->

    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>

</body>
</html>

<script>
    // Register Form Validation
    function validateRegistrationForm() {
        var username = document.getElementById("username").value.trim();
        var email = document.getElementById("email").value.trim();
        var nic = document.getElementById("nic").value.trim();
        var tno = document.getElementById("tno").value.trim();
        var password = document.getElementById("password").value.trim();
        var termsChecked = document.getElementById("terms").checked;

        // Regular Expressions for Validation
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var phonePattern = /^\d{10}$/;  // Assuming a 10-digit phone number
        var nicPattern = /^[0-9]+$/;  // For Sri Lankan NIC, e.g., 123456789V or 123456789012

        // Username Validation
        if (username === "") {
            alert("Username cannot be empty.");
            return false;
        }

        // Email Validation
        if (email === "") {
            alert("Email cannot be empty.");
            return false;
        } else if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // NIC Validation
        if (nic === "") {
            alert("NIC cannot be empty.");
            return false;
        } else if (!nicPattern.test(nic)) {
            alert("Please enter a valid NIC number.");
            return false;
        }

        // Phone Number Validation
        if (tno === "") {
            alert("Tell No cannot be empty.");
            return false;
        } else if (!phonePattern.test(tno)) {
            alert("Please enter a valid phone number (10 digits).");
            return false;
        }

        // Password Validation
        if (password === "") {
            alert("Password cannot be empty.");
            return false;
        }

        // Terms and Conditions Validation
        if (!termsChecked) {
            alert("You must agree to the terms & conditions.");
            return false;
        }

        return true;  // Proceed with form submission if all validations pass
    }
</script>