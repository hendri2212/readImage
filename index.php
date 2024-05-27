<?php
    // Directory containing the images
    $directory = 'gambar/';

    // Get all image files from the directory
    $images = glob($directory . '*.{jpg,JPG,jpeg,JPEG,png,gif}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Gambar Kalian</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .frame {
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 0;
            padding-top: 100%;
        }

        .frame img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1 class="bg-warning p-2">Pilih dan Download Gambar</h1>
    <div class="row px-2">
        <?php foreach ($images as $image): ?>
            <div class="col-6 text-center">
                <div class="frame">
                    <img src="<?= $image; ?>" alt="Image" class="img-thumbnail">
                </div>
                <a href="download.php?file=<?php echo urlencode($image); ?>" class="btn btn-sm btn-info my-2">Download</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>