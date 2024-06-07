<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Register Page</title>
    <style>
        .form-signin {
            width: 100%;
            max-width: 550px;
            padding: 15px;
            margin: auto;
        }
    </style>
</head>
<body class="text-center">
    <?php
        $config = parse_ini_file('../config.ini', true);
    ?>
    <form action="save.php" method="POST" class="form-signin">
        <img class="mb-4 mt-5" src="../assets/logo.png" class="img-fluid" style="width: 25%">
        <h2 class="font-weight-bold"><font style="color:#343a40;">SMKN 1 Kotabaru</font></h2>
        <h6 class="font-weight-bold text-dark mb-4">SMK CERDAS (CERMAT TERAMPIL DISIPLIN IKHLAS)</h6>

        <input type="text" id="full_name" name="full_name" class="form-control form-control-lg rounded-0" placeholder="Nama Lengkap" required autofocus>
        <input type="tel" id="phone" name="phone" class="form-control form-control-lg rounded-0 border-top-0" placeholder="No. Whatsapp" required>
        <input type="text" id="school" name="school" value="<?= $config['school']['name'] ?>" class="form-control form-control-lg rounded-0 border-top-0" readonly>
        <div class="d-grid">
            <input type="submit" value="Submit" class="btn btn-lg btn-success rounded-0">
        </div>
    </form>
</body>
</html>