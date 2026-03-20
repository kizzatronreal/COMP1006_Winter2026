<?php require "includes/header.php"; ?>

    <h2>Upload a Profile Picture</h2>

    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <button type="submit">Upload Image</button>
    </form>

<?php require "includes/footer.php"; ?>
