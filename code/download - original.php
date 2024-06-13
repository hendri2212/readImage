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
            header('Accept-Encoding: gzip, deflate, br, identity, *, *;q=0,1');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file specified.";
    }
?>