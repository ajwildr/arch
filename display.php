<!DOCTYPE html>
<html>
<head>
    <title>Display Image</title>
</head>
<body>
    <h2>Uploaded Image</h2>
    <?php
    $image_path = "images/fixed_image.jpg";
    if (file_exists($image_path)) {
        // Add timestamp to prevent browser caching
        echo "<img src='$image_path?" . time() . "' alt='Uploaded Image'>";
    } else {
        echo "No image has been uploaded yet.";
    }
    ?>
</body>
</html>