<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload - ALA Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Image Upload Application</h1>
        <nav>
            <a href="index.php">Upload</a>
            <a href="gallery.php">Gallery</a>
            <?php if (isset($_SESSION['uploaded_files'])): ?>
                <a href="logout.php">Clear Session</a>
            <?php endif; ?>
        </nav>

        <?php
        if (isset($_SESSION['message'])) {
            $type = $_SESSION['message_type'] ?? 'info';
            echo "<div class='message $type'>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>

        <div class="upload-section">
            <h2>Upload a New Image</h2>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="submit">Upload Image</button>
            </form>
            <p style="text-align: center; margin-top: 10px; font-size: 0.9em; color: #666;">
                Allowed formats: JPG, JPEG, PNG, GIF (Max size: 20MB)
            </p>
        </div>
    </div>
</body>
</html>
