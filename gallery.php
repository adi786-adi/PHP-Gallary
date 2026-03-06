<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery - ALA Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Image Gallery</h1>
        <nav>
            <a href="index.php">Upload</a>
            <a href="gallery.php">Gallery</a>
            <?php if (isset($_SESSION['uploaded_files'])): ?>
                <a href="logout.php">Clear Session</a>
            <?php endif; ?>
        </nav>

        <div class="gallery">
            <?php
            $files = glob("uploads/*.*");
            
            // Sort files by name A-Z
            usort($files, function($a, $b) {
                return strcasecmp(basename($a), basename($b));
            });

            if (count($files) > 0) {
                foreach ($files as $file) {
                    $fileName = basename($file);
                    $fileSize = round(filesize($file) / 1024, 2); // Size in KB
                    echo '
                    <div class="gallery-item">
                        <img src="'.$file.'" alt="'.$fileName.'">
                        <div class="overlay">
                            <div class="info-text">
                                <strong>'.$fileName.'</strong><br>
                                Size: '.$fileSize.' KB
                            </div>
                            <div class="actions">
                                <a href="'.$file.'" download class="btn btn-save">Save</a>
                                <a href="delete.php?file='.$fileName.'" class="btn btn-delete" onclick="return confirm(\'Are you sure?\')">Delete</a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p style="text-align: center; grid-column: 1 / -1;">No images uploaded yet.</p>';
            }
            ?>
        </div>

        <?php if (isset($_SESSION['uploaded_files'])): ?>
        <div style="margin-top: 40px; padding: 20px; border-top: 1px solid #eee;">
            <h3>Your Recent Activity (Session Tracked)</h3>
            <ul>
                <?php foreach ($_SESSION['uploaded_files'] as $upload): ?>
                    <li>Uploaded <strong><?php echo $upload['name']; ?></strong> at <?php echo $upload['time']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
