<?php require "includes/header.php"; ?>

    <h2>Image Gallery</h2>

    <?php
    // Define uploads directory
    $uploadDir = 'uploads/';

    // Check if uploads folder exists and has files
    if (is_dir($uploadDir)) {
        // Get all files in uploads folder
        $files = scandir($uploadDir);
        
        // Filter out and
        $images = array_filter($files, function($file) use ($uploadDir) {
            return is_file($uploadDir . $file) && $file !== '.' && $file !== '..';
        });

        if (count($images) > 0) {
            echo "<p>Total images uploaded: " . count($images) . "</p>";
            echo "<br>";
            
            foreach ($images as $image) {
                $imagePath = $uploadDir . $image;
                echo "<p>" . htmlspecialchars($image) . "</p>";
                echo "<img src='" . htmlspecialchars($imagePath) . "' alt='" . htmlspecialchars($image) . "' style='max-width: 300px; border: 1px solid #ccc; margin-bottom: 20px;'>";
                echo "<br>";
            }
        } else {
            echo "<p>No images uploaded yet.</p>";
        }
    } else {
        echo "<p>Uploads folder does not exist.</p>";
    }
    ?>

    <br>
    <a href="index.php">Upload an Image</a>

<?php require "includes/footer.php"; ?>
