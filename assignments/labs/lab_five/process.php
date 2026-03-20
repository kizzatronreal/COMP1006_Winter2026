<?php require "includes/header.php"; ?>

    <h2>Upload Result</h2>

    <?php
    // Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Get file information
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileName = basename($_FILES['image']['name']);
            $fileSize = $_FILES['image']['size'];
            $fileType = mime_content_type($fileTmpName);

            // Define upload directory
            $uploadDir = 'uploads/';
            $uploadPath = $uploadDir . $fileName;

            // Validate file type 
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileType, $allowedTypes)) {
                echo "<p>Error: Only JPEG, PNG, and GIF images are allowed.</p>";
            } else {
                // Move uploaded file
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    echo "<p>Image uploaded successfully!</p>";
                    echo "<p>File name: " . htmlspecialchars($fileName) . "</p>";
                    echo "<p>File size: " . htmlspecialchars($fileSize) . " bytes</p>";
                    echo "<br>";
                    echo "<h3>Uploaded Image:</h3>";
                    echo "<img src='" . htmlspecialchars($uploadPath) . "' alt='Uploaded Image' style='max-width: 400px; border: 1px solid #ccc;'>";
                } else {
                    echo "<p>Error: Failed to move uploaded file.</p>";
                }
            }
        } else {
            echo "<p>Error: No file uploaded or upload error occurred.</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }
    ?>

    <br>
    <br>
    <a href="index.php">Upload Another Image</a> | <a href="gallery.php">View Gallery</a>

<?php require "includes/footer.php"; ?>
