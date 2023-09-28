<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/biodata.css") ?>">
    <title>Document</title>
</head>

<body>
    <div class="background">
        <img src="<?= base_url('/assets/img/aprik.jpeg') ?>" alt="cantik" width=130 height=130 class="gambar">
        <div class="teks">
            <p>Nama: <?= $nama ?></p>
            <p>NPM: <?= $npm ?></p>
            <p>Kelas: <?= $id_kelas ?></p>
        </div>
    </div>
</body>

</html>