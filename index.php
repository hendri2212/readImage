<?php
    // Directory containing the images
    $directory = 'gambar/';

    // Get all image files from the directory
    $images = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Gambar Kalian</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h1 class="bg-warning p-2">Pilih dan Download Gambar - Hendri Arifin</h1>
    <div class="row">
        <?php foreach ($images as $image): ?>
            <div class="col-2">
                <img src="<?php echo $image; ?>" alt="Image" class="img-fluid">
                <a href="download.php?file=<?php echo urlencode($image); ?>" class="btn btn-sm btn-info my-2">Download</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>