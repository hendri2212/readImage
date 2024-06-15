<style>
    h1 {
        text-align: center;
        margin-top: 50px;
    }
</style>
<h1>Selalu buka halaman ini untuk menjalankan convert otomatis</h1>
<?php
    header("Refresh: 30; url=/readImage/convert.php");

    // Define paths to the directories
    $originalDir = 'gambar/original/';
    $thumbnailDir = 'gambar/thumbnail/';
    
    // Get lists of files in both directories
    $originalFiles = scandir($originalDir);
    $thumbnailFiles = scandir($thumbnailDir);
    
    // Function to create a thumbnail
    function createThumbnail($originalPath, $thumbnailPath) {
        // Load the original image
        $image = imagecreatefromjpeg($originalPath);
        if (!$image) {
            return false;
        }
        
        // Get original dimensions
        $width = imagesx($image);
        $height = imagesy($image);
    
        // Set the size for the thumbnail while preserving aspect ratio
        if ($width > $height) {
            $thumbWidth = 150;
            $thumbHeight = $height / $width * $thumbWidth;
        } else {
            $thumbHeight = 150;
            $thumbWidth = $width / $height * $thumbHeight;
        }
    
        // Create a new true color image with the thumbnail size
        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

        // Copy and resize the original image into the thumbnail
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);
    
        if ($width > $height) {
            $thumb = imagerotate($thumb, 90, 0);
        }

        // Save the thumbnail to disk
        imagejpeg($thumb, $thumbnailPath);
    
        // Free up memory
        imagedestroy($image);
        imagedestroy($thumb);
    
        return true;
    }
    
    // Iterate over original files and check for corresponding thumbnails
    foreach ($originalFiles as $file) {
        if ($file !== '.' && $file !== '..') {
            $originalFilePath = $originalDir . $file;
            $thumbnailFilePath = $thumbnailDir . $file;
            
            if (!file_exists($thumbnailFilePath)) {
                // Thumbnail does not exist, create it
                if (createThumbnail($originalFilePath, $thumbnailFilePath)) {
                    echo "Created thumbnail for: $file\n";
                } else {
                    echo "Failed to create thumbnail for: $file\n";
                }
            }
        }
    }
?>