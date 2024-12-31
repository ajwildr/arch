<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "images/";
    $target_file = $target_dir . "fixed_image.jpg";  // Fixed filename
    
    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // Check if image file is a actual image
    if(isset($_FILES["imageFile"])) {
        $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
        if($check !== false) {
            // If file exists, it will be replaced
            if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
                echo "The file has been uploaded successfully.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="imageFile" accept="image/*" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
