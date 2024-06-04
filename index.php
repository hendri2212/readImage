<?php
    // Directory containing the images
    $directory = 'gambar/';

    // Get all image files from the directory
    $images = glob($directory . '*.{jpg,JPG,jpeg,JPEG,png,gif}', GLOB_BRACE);

    // Cek session jika belum login
    session_start();
    if (!isset($_SESSION['phone'])) {
        header('Location: code/login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Gambar Kalian</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
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
                    <img src="<?= $image; ?>" alt="Image" class="img-thumbnail" onclick="showImageModal('<?= $image; ?>')">
                </div>
                <a href="code/download.php?file=<?php echo urlencode($image); ?>" class="btn btn-sm btn-info my-2">Download</a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Modal -->
    <div id="imageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="previewImage" src="" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showImageModal(imageUrl) {
            var previewImage = document.getElementById('previewImage');
            previewImage.src = imageUrl;
            $('#imageModal').modal('show');
        }
    </script>
</body>
</html>