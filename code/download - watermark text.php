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

            // Add watermark text to the downloaded file
            $watermarkText = "SMKN 1 Kotabaru";
            $image = imagecreatefromjpeg($file);
            $textColor = imagecolorallocate($image, 255, 255, 255);
            $fontSize = 20;
            $x = 15;
            $y = 25;
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, '../watermark/Asquire.otf', $watermarkText);
            imagejpeg($image, $file);
            imagedestroy($image);

            readfile($file);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file specified.";
    }
?>