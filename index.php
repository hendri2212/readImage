<?php
    // Cek host localhost atau bukan
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        // Jika localhost
        $host = 'localhost/readImage';
    } else {
        // Jika bukan localhost
        $host = $_SERVER['HTTP_HOST'];
    }
    header('Accept-Encoding: gzip, deflate, br, identity, *, *;q=0,1');
    // Directory containing the images
    $directory = 'gambar/thumbnail/';
    $originalDirectory = 'gambar/original/';

    // Get all image files from the directory
    $images = glob($directory . '*.{jpg,JPG,jpeg,JPEG,png,gif}', GLOB_BRACE);
    $originalImages = glob($originalDirectory . '*.{jpg,JPG,jpeg,JPEG,png,gif}', GLOB_BRACE);

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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
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
        <?php
            // Pagination variables
            $perPage = 40; // Number of images per page
            $totalImages = count($images); // Total number of images
            $totalPages = ceil($totalImages / $perPage); // Total number of pages

            // Get the current page number
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($currentPage - 1) * $perPage;
            $end = $start + $perPage;
            $paginatedImages = array_slice($images, $start, $end);

            // Loop through the paginated images
            foreach ($paginatedImages as $image):
        ?>
        <div class="col-lg-2 col-md-2 col-4 text-center p-0">
            <div class="frame">
                <img src="<?= $image; ?>" loading="lazy" decoding="asynchronous" alt="Image" class="img-thumbnail rounded-0 p-0 m-1" onclick="showImageModal('<?= str_replace('thumbnail', 'original', $image) ?>')">
            </div>
            <a href="code/download.php?file=<?php echo urlencode('../' . str_replace('thumbnail', 'original', $image)); ?>" class="btn btn-sm btn-info my-2">Download</a>
        </div>
        <?php endforeach; ?>

        <!-- Pagination links -->
        <div class="col-12 mt-4">
            <nav aria-label="Image Pagination">
                <ul class="pagination justify-content-center pagination-sm">
                    <!-- First Page Link -->
                    <li class="page-item <?php if ($currentPage == 1) echo 'disabled'; ?>">
                        <a href="?page=1" class="page-link">First</a>
                    </li>
                    <!-- Previous Page Link -->
                    <!-- <li class="page-item <?php if ($currentPage == 1) echo 'disabled'; ?>">
                        <a href="?page=<?php echo $currentPage - 1; ?>" class="page-link">Prev</a>
                    </li> -->
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <!-- Next Page Link -->
                    <!-- <li class="page-item <?php if ($currentPage == $totalPages) echo 'disabled'; ?>">
                        <a href="?page=<?php echo $currentPage + 1; ?>" class="page-link">Next</a>
                    </li> -->
                    <!-- Last Page Link -->
                    <li class="page-item <?php if ($currentPage == $totalPages) echo 'disabled'; ?>">
                        <a href="?page=<?php echo $totalPages; ?>" class="page-link">Last</a>
                    </li>
                </ul>
            </nav>
        </div>
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
                    <img id="previewImage" src="https://cdn.dribbble.com/users/2973561/screenshots/5757826/media/221d6bfc1960ab98a7585fcc2a4d0181.gif" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        let image = 'https://cdn.dribbble.com/users/2973561/screenshots/5757826/media/221d6bfc1960ab98a7585fcc2a4d0181.gif';
        $('#imageModal').on('shown.bs.modal', function (e) {
            var previewImage = document.getElementById('previewImage');
            previewImage.src = image;
        });
        
        function showImageModal(imageUrl) {
            $('#imageModal').modal('show');
            image = imageUrl;
        }
        
        $('#imageModal').on('hide.bs.modal', function (e) {
            var previewImage = document.getElementById('previewImage');
            image = 'https://cdn.dribbble.com/users/2973561/screenshots/5757826/media/221d6bfc1960ab98a7585fcc2a4d0181.gif';
            previewImage.src = image;
        });
    </script>
</body>
</html>