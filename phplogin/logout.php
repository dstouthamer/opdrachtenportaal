<?php
session_start();
session_destroy();
// Logout and send to login page.
header('Location: index.html');
?>