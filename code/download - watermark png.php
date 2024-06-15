<?php
    if (isset($_GET['file'])) {
        $file = urldecode($_GET['file']); // Decode URL-encoded string

        // Check if the file exists
        if (file_exists($file)) {
            // Get the file's basename
            $basename = basename($file);

            // Set headers to initiate file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $basename);
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));

            // Add watermark to the image
            $watermark = imagecreatefrompng('../assets/icon/SMPN2ktbPort.png'); // Replace with the actual path to your watermark image
            $image = imagecreatefromjpeg($file); // Assuming the file is a JPEG image, change the function accordingly for other image types

            // Calculate the position to place the watermark
            $watermarkWidth = imagesx($watermark);
            $watermarkHeight = imagesy($watermark);
            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);
            $positionX = ($imageWidth - $watermarkWidth) / 2; // Center the watermark horizontally
            $positionY = ($imageHeight - $watermarkHeight) / 2; // Center the watermark vertically

            // Apply the watermark to the image
            imagecopy($image, $watermark, $positionX, $positionY, 0, 0, $watermarkWidth, $watermarkHeight);

            // Output the modified image
            imagejpeg($image, null, 100); // Change the output path and quality as needed

            // Clean up
            imagedestroy($image);
            imagedestroy($watermark);

            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file specified.";
    }
?>