<?php
session_start();

if (isset($_GET['file'])) {
    $file = 'uploads/' . basename($_GET['file']);
    
    if (file_exists($file)) {
        if (unlink($file)) {
            $_SESSION['message'] = "Image deleted successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error deleting file.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "File not found.";
        $_SESSION['message_type'] = "error";
    }
}

header("Location: gallery.php");
exit();
