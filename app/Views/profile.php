<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<style>
        .tengah {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top {
            margin-top: 20px;
        }
    </style>

<div class="background">
    <img src="<?= base_url('/assets/img/aprik.jpeg') ?>" alt="cantik" width=130 height=130 class="gambar">
    <div class="teks">
        <p>Nama: <?= $nama ?></p>
        <p>NPM: <?= $npm ?></p>
        <p>Kelas: <?= $id_kelas ?></p>
    </div>
</div>
<?= $this->endSection() ?>