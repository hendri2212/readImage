<?php
    if (isset($_GET['file'])) {
        $file = urldecode($_GET['file']); // Decode URL-encoded string

        // Check if the file exists
        if (file_exists($file)) {
            // Get the file's basename
            $basename = basename($file);

            // Add watermark to the image
            $watermark = imagecreatefrompng('../assets/icon/watermark.png'); // Replace with the actual path to your watermark image
            $image = imagecreatefromjpeg($file); // Assuming the file is a JPEG image, change the function accordingly for other image types
            // $image = imagecreatefromjpeg('../watermark/DSC01400.jpg'); // Assuming the file is a JPEG image, change the function accordingly for other image types

            // Calculate the position to place the watermark
            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);
            if ($imageWidth > $imageHeight) {
                $image = imagerotate($image, 90, 0);
            }
            
            $watermarkWidth = imagesx($watermark);
            $watermarkHeight = imagesy($watermark);
            if ($watermarkWidth > $watermarkHeight) {
                $watermark = imagerotate($watermark, 90, 0);
            }

            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);
            $watermarkWidth = imagesx($watermark);
            $watermarkHeight = imagesy($watermark);

            // $positionX = ($imageWidth - $watermarkWidth) / 2; // Center the watermark horizontally
            // $positionX = ($imageWidth - $watermarkWidth) - 10; // Center the watermark horizontally
            $positionX = $imageWidth - $watermarkWidth - 10; // Center the watermark horizontally
            // $positionY = ($imageHeight - $watermarkHeight) / 2; // Center the watermark vertically
            // $positionY = ($imageHeight - $watermarkHeight) - 10; // Center the watermark vertically
            $positionY = $imageHeight - $watermarkHeight - 10; // Center the watermark vertically

            // Apply the watermark to the image
            imagecopy($image, $watermark, $positionX, $positionY, 0, 0, $watermarkWidth, $watermarkHeight);

            // Set headers to initiate file download
            header('Content-Description: File Transfer');
            // header('Content-Type: application/octet-stream');
            header('Content-type: image/jpeg'); // Adjust for PNG or GIF
            header('Content-Disposition: attachment; filename=' . $basename);
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Accept-Encoding: gzip, deflate, br, identity, *, *;q=0,1');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));

            // Output the modified image
            // imagejpeg('../hasil/' . $image, null, 100); // Change the output path and quality as needed
            imagejpeg($image, null, 100); // Change the output path and quality as needed

            // Clean up
            // imagedestroy($image);
            // imagedestroy($watermark);
            readfile($file);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file specified.";
    }
?>