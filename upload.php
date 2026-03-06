<?php
session_start();

if (isset($_POST['submit'])) {
    $file = $_FILES['image'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 200000000) { // 20MB limit
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // Store in session for tracking
                    if (!isset($_SESSION['uploaded_files'])) {
                        $_SESSION['uploaded_files'] = [];
                    }
                    $_SESSION['uploaded_files'][] = [
                        'name' => $fileName,
                        'path' => $fileDestination,
                        'time' => date("Y-m-d H:i:s")
                    ];

                    $_SESSION['message'] = "Image uploaded successfully!";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "There was an error moving the uploaded file.";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Your file is too big! (Max 2MB)";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "There was an error uploading your file.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "You cannot upload files of this type! (Allowed: JPG, JPEG, PNG, GIF)";
        $_SESSION['message_type'] = "error";
    }

    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
