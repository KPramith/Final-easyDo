<?php session_start(); ?>
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/funtions.php'); ?>
<?php 
    if(!isset( $_SESSION['user_id'])) {
        header('Location:index.php');
    }
?>

<?php 
    $errors = array();
    $user_id    = '';
    $user_name  = '';
    $email      = '';
    $tel_num    = '';
    $work_type  = '';

    if (isset($_GET['user_id'])) {
        //getting the user information

     
        $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
        $query = "SELECT * FROM workers WHERE id ={$user_id} LIMIT 1";

        $result_set = mysqli_query($connection, $query);

        if($result_set){
            if(mysqli_num_rows($result_set) == 1){
                //user found
                $result = mysqli_fetch_assoc($result_set);

                $user_name  = $result['user_name'];
                $email      = $result['email'];
                $tel_num    = $result['tel_num'];
                $work_type  = $result['work_type'];
            }else{
                //user not found
                header('Location: plumbing.php?err=user_not_found');
            }
        }else{
            //query unsuccessful
            header('Location: plumbing.php?err=query_fieled');
        }


    }
    if(isset($_POST['submit'])) {

        $user_id   = $_POST['user_id'];     
        $user_name = $_POST['user_name'];
        $email     = $_POST['email'];
        $tel_num     = $_POST['tel_num'];
    
        
      
      
            //cheaking required fields
           $req_fields = array('user_id','user_name','email','tel_num');
           $errors = array_merge($errors, check_req_fields($req_fields));
        
            // checking max lenth
            $max_len_fields = array('user_name' => 50,'email' =>100,'tel_num');
            $errors = array_merge($errors, check_max_len($max_len_fields));
           
            //cheaking if email address alredy exists
   
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $query = "SELECT * FROM workers WHERE email = '{$email}' AND id !={$user_id} LIMIT 1";
   
            $result_set = mysqli_query($connection, $query);
   
            if ($result_set) {
               if  (mysqli_num_rows($result_set) == 1){
                   $errors[] ='Email Address Already Exists.';
               }
            }
            if (empty($errors)){
               //no errors found...adding record
               $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
               $email = mysqli_real_escape_string($connection, $_POST['email']);
               $tel_num = mysqli_real_escape_string($connection, $_POST['tel_num']);
           
             
               
               //email already sanitized
   
              $query = "UPDATE Workers SET ";
              $query .= "user_name = '{$user_name }', ";
              $query .= "email = '{$email }', "; 
              $query .= "tel_num = '{$tel_num }' ";
              $query .= "WHERE id = {$user_id} LIMIT 1";
   
              
   
               $result = mysqli_query($connection, $query);
   
               
               if($result){
                   //query successful...redirection to user page
                   header('Location: plumbing.php?plumbing_modified=true');
               }else {
                   $errors[] = 'Failed To modify the record.';
               }
   
            }
   
       }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Plumbing</title>
    <link rel="stylesheet" href="css/modify.css">
</head>
<body>
    <header> 
        <div class="appname"><h2>easyDo</h2></div>
        <div class="loggedin">Welcome <?php  echo '' .$user_name . '';  ?> </div> 
    </header>

    <main> 
    <h1><?php  echo '' .$user_name . '';  ?>
    <div class="pic">
        <img src="images/icon.png" class="pimg">
    </div>
    <span><a href="profile-plumbing.php? 
    user_id= <?php echo $user_id; ?>">< Back to Profile</a></span></h1>

    <?php
        if(!empty($errors)){
            display_errors($errors);
        }
    ?>

    <form action="modify-plumbing.php" method = "post" class="userform">
    <input type="hidden" name="user_id" value= "<?php echo $user_id; ?>" >
        <p>
            <label for="">User Name:</label>
            <input type="text" name="user_name" <?php echo 'value="' .$user_name . '"'; ?>>
        </p>

        <p>
            <label for="">Emai Address:</label>
            <input type="email" name="email" <?php echo 'value="' .$email . '"'; ?>>
        </p>

        <p>
            <label for="">Telephone:</label>
            <input type="text" name="tel_num" <?php echo 'value="' .$tel_num . '"'; ?>>
        </p>
       

        <p>
            <label for="">Working Type:</label>
            <input type="text" name="work_type " <?php echo 'value="' . $work_type . '"'; ?> disabled>
        </p>

    
        <p>
            <label for="">&nbsp;</label>
            <button type="submit" name="submit">Save Data</button>
        </p>
    </form>

    </main>
    
</body>
</html>