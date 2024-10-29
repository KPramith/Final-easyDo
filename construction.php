<?php session_start();?>
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/funtions.php'); ?>
<?php 
    //cheking if a user is logged in
    if(!isset( $_SESSION['user_id'])) {
        header('Location:index.php');
    }

    $user_list ='';
   

    //getting the list of user

    $query = "SELECT * FROM workers WHERE work_type='Construction' ORDER BY user_name";
    $users = mysqli_query($connection, $query);

    verify_query($users);

    while ($user = mysqli_fetch_assoc($users)) {
            $user_list .= "<tr>";
            $user_list .= "<td>{$user['user_name']}</td>";
            $user_list .= "<td>{$user['email']}</td>";
            $user_list .= "<td>{$user['tel_num']}</td>";
            $user_list .= "<td>{$user['work_type']}</td>";
            $user_list .= "<td><a href=\"profile-construction.php?user_id={$user['id']}\">Go to Profile ></a></td>";
          
            $user_list .= "</tr>"; 
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction</title>
    <link rel="stylesheet" href="css/workers.css">

</head>
<body>
    <header> 
        <div class="appname"><a href="service.php"><h2>easyDo</h2></a></div>
        <div class="loggedin">Welcome <?php  echo $_SESSION['user_name']; ?> 
    </header>

    <main> 
    <h1> Construction<span></span></h1>

    <table class="masterlist">
        <tr>
            <th>User Name</th>
            <th>Gmail Address</th>
            <th>Telephpne</th>
            <th>WorkType</th>
            <th>Profile</th>
          
        </tr>
        <tr>
            <?php echo $user_list; ?>
        </tr>
       
      
    </table>
    
    </main> 

<?php include('includes/footer.php'); ?>

   

    </body>
</html>
