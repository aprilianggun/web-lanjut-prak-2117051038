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
    <div class="card">
        <div class="card">
            <div class="form-container">
                <form action="<?= base_url('user/store') ?>" method="post">
                    <div class="form-input">
                        <input type="text" name="nama" placeholder="Nama" value="<?= old('nama') ?>" required />
                    </div>
                    <div class="form-input">
                        <input type="text" name="npm" placeholder="NPM" required />
                    </div>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>
                            <select name="id_kelas" id="kelas">
                                <?php foreach ($kelas as $item) : ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <?php if (session()->has('error')) : ?>
                        <div class="error-message">
                            <?= session('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->has('success')) : ?>
                        <div class="success-message">
                            <?= session('success') ?>
                        </div>
                    <?php endif; ?>
                    <input type="submit" value="Submit" class="btn-login" />
                </form>
            </div>
        </div>

    </div>

<?= $this->endSection()?>