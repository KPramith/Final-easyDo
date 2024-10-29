<?php
session_start();

$_SESSION = array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-86400, '/');
}
session_destroy(); // Destroy all session data

header('Location: login.html');
?>
0