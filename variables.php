<?php

// profile-carpentry.php
session_start();
require_once('includes/connection.php');
require_once('includes/functions.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$errors = array();
$user_name = '';
$email = '';
$tel_num = '';
$work_type = '';
$profile_photo = '';

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM workers WHERE id = {$user_id} LIMIT 1";
    
    $result_set = mysqli_query($connection, $query);
    verify_query($result_set);
    
    if (mysqli_num_rows($result_set) == 1) {
        $result = mysqli_fetch_assoc($result_set);
        $user_name = $result['user_name'];
        $email = $result['email'];
        $tel_num = $result['tel_num'];
        $work_type = $result['work_type'];
        $profile_photo = $result['profile_photo'];
    } else {
        header('Location: carpentry.php?err=user_not_found');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Carpentry</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header> 
        <div class="appname"><h2>easyDo</h2></div>
        <div class="loggedin">Welcome <?php echo $_SESSION['user_name']; ?></div>
    </header>

    <main> 
        <h1>Profile <span><a href="carpentry.php">< Back to carpentry list</a></span></h1>

        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <div class="prof">
            <form action="modify-carpentry.php" method="post" class="userform" enctype="multipart/form-data">
                <div class="profile-photo">
                    <img src="<?php echo !empty($profile_photo) ? 'uploads/' . $profile_photo : 'images/default-avatar.jpg'; ?>" 
                         alt="Profile Photo" id="profile-preview">
                    <div class="photo-upload">
                        <input type="file" id="photo-input" name="profile_photo" accept="image/*" onchange="previewImage(this);">
                        <label for="photo-input">Change Photo</label>
                    </div>
                </div>

                <p>
                    <label for="user_name">User Name:</label>
                    <span><?php echo htmlspecialchars($user_name); ?></span>
                </p>

                <p>
                    <label for="email">Email Address:</label>
                    <span><?php echo htmlspecialchars($email); ?></span>
                </p>

                <p>
                    <label for="tel_num">Telephone:</label>
                    <span><?php echo htmlspecialchars($tel_num); ?></span>
                </p>

                <p>
                    <label for="work_type">Working Type:</label>
                    <span><?php echo htmlspecialchars($work_type); ?></span>
                </p>

                <p>
                    <button type="button">
                        <a href="modify-carpentry.php?user_id=<?php echo $user_id; ?>">Edit Profile</a>
                    </button>
                </p>
            </form>
        </div>
    </main>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('profile-preview').setAttribute('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>

<?php
// modify-carpentry.php
session_start();
require_once('includes/connection.php');
require_once('includes/functions.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$errors = array();
$user_id = '';
$user_name = '';
$email = '';
$tel_num = '';
$work_type = '';
$profile_photo = '';

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM workers WHERE id = {$user_id} LIMIT 1";
    
    $result_set = mysqli_query($connection, $query);
    verify_query($result_set);
    
    if (mysqli_num_rows($result_set) == 1) {
        $result = mysqli_fetch_assoc($result_set);
        $user_name = $result['user_name'];
        $email = $result['email'];
        $tel_num = $result['tel_num'];
        $work_type = $result['work_type'];
        $profile_photo = $result['profile_photo'];
    } else {
        header('Location: carpentry.php?err=user_not_found');
        exit();
    }
}

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $tel_num = mysqli_real_escape_string($connection, $_POST['tel_num']);
    $work_type = mysqli_real_escape_string($connection, $_POST['work_type']);

    // Handle file upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['profile_photo']['name'];
        $file_tmp = $_FILES['profile_photo']['tmp_name'];
        $file_type = $_FILES['profile_photo']['type'];
        $file_size = $_FILES['profile_photo']['size'];
        
        // File extensions
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        
        if (in_array($file_ext, $extensions)) {
            if ($file_size < 5000000) { // Less than 5MB
                $new_file_name = uniqid('profile_', true) . '.' . $file_ext;
                $upload_path = 'uploads/' . $new_file_name;
                
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Delete old photo if exists
                    if (!empty($profile_photo) && file_exists('uploads/' . $profile_photo)) {
                        unlink('uploads/' . $profile_photo);
                    }
                    $profile_photo = $new_file_name;
                } else {
                    $errors[] = "Failed to upload file.";
                }
            } else {
                $errors[] = "File size must be less than 5MB.";
            }
        } else {
            $errors[] = "Only JPG, JPEG & PNG files are allowed.";
        }
    }

    if (empty($errors)) {
        $query = "UPDATE workers SET 
                  user_name = '{$user_name}',
                  email = '{$email}',
                  tel_num = '{$tel_num}',
                  work_type = '{$work_type}',
                  profile_photo = '{$profile_photo}'
                  WHERE id = {$user_id}";

        $result = mysqli_query($connection, $query);
        verify_query($result);
        
        header('Location: profile-carpentry.php?user_id=' . $user_id . '&msg=profile_updated');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header> 
        <div class="appname"><h2>easyDo</h2></div>
        <div class="loggedin">Welcome <?php echo $_SESSION['user_name']; ?></div>
    </header>

    <main> 
        <h1>Modify Profile <span><a href="profile-carpentry.php?user_id=<?php echo $user_id; ?>">< Back to Profile</a></span></h1>

        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <div class="prof">
            <form action="modify-carpentry.php" method="post" class="userform" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                
                <div class="profile-photo">
                    <img src="<?php echo !empty($profile_photo) ? 'uploads/' . $profile_photo : 'images/default-avatar.jpg'; ?>" 
                         alt="Profile Photo" id="profile-preview">
                    <div class="photo-upload">
                        <input type="file" id="photo-input" name="profile_photo" accept="image/*" onchange="previewImage(this);">
                        <label for="photo-input">Change Photo</label>
                    </div>
                </div>

                <p>
                    <label for="user_name">User Name:</label>
                    <input type="text" name="user_name" id="user_name" value="<?php echo htmlspecialchars($user_name); ?>" required>
                </p>

                <p>
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </p>

                <p>
                    <label for="tel_num">Telephone:</label>
                    <input type="tel" name="tel_num" id="tel_num" value="<?php echo htmlspecialchars($tel_num); ?>" required>
                </p>

                <p>
                    <label for="work_type">Working Type:</label>
                    <select name="work_type" id="work_type" required>
                        <option value="Carpenter" <?php if($work_type == 'Carpenter') echo 'selected'; ?>>Carpenter</option>
                        <option value="Cabinet Maker" <?php if($work_type == 'Cabinet Maker') echo 'selected'; ?>>Cabinet Maker</option>
                        <option value="Furniture Maker" <?php if($work_type == 'Furniture Maker') echo 'selected'; ?>>Furniture Maker</option>
                    </select>
                </p>

                <p>
                    <button type="submit" name="submit">Save Changes</button>
                </p>
            </form>
        </div>
    </main>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('profile-preview').setAttribute('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
