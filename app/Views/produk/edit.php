<?= $this->extend('default') ?>

<?php $this->section('title') ?>
    Edit Produk | Manajemen Produk
<?php $this->endSection('title') ?>

<?php $this->section('content') ?>
<div class="w-100 h-100">
    <div class="card w-50 mx-auto mt-5 border-0 shadow-sm">
        <div class="card-body">
            <div class="ps-3 fw-bold text-primary fs-5">Edit Produk</div>
            <form action="<?= base_url('produk/edit/'.$produk['id_produk']) ?>" method="POST" class="p-3">
                <?= csrf_field(); ?>
                <?php function errorField($field){
                    if (session()->has('errors')) {
                        return session('errors')->getError($field);
                    }
                } ?>
                <div class="pb-4 position-relative">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control mb-1 <?= errorField('nama_produk') ? 'is-invalid' : '' ?>" placeholder="Masukan nama produk" aria-label="nama_produk" autocomplete="false"  value="<?= $produk['nama_produk'] ?>">
                    <?php if(errorField('nama_produk')) : ?>
                        <div class="text-danger text-sm position-absolute bottom-0 ps-2"><?= errorField('nama_produk') ?></div>
                    <?php endif ?>
                </div>
                <div class="pb-4 position-relative">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control mb-1 <?= errorField('harga') ? 'is-invalid' : '' ?>" placeholder="Masukan harga" aria-label="harga" value="<?= $produk['harga'] ?>">
                    <?php if(errorField('harga')) : ?>
                        <div class="text-danger text-sm position-absolute bottom-0 ps-2"><?= errorField('harga') ?></div>
                    <?php endif ?>
                </div>
                <div class="pb-4 position-relative">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control mb-1 <?= errorField('kategori') ? 'is-invalid' : '' ?>" placeholder="Masukan kategori" aria-label="kategori" value="<?= $produk['kategori'] ?>">
                    <?php if(errorField('kategori')) : ?>
                        <div class="text-danger text-sm position-absolute bottom-0 ps-2"><?= errorField('kategori') ?></div>
                    <?php endif ?>
                </div>
                <div class="pb-4 position-relative">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control <?= errorField('status') ? 'is-invalid' : '' ?>">
                        <option selected value="">---Pilih Status---</option>

                        <?php if($produk['status'] == 'bisa_dijual') : ?>
                            <option selected value="bisa_dijual">Bisa dijual</option>
                        <?php else : ?>
                            <option value="bisa_dijual">Bisa dijual</option>
                         <?php endif;  ?>

                         <?php if($produk['status'] == 'tidak_bisa_dijual') : ?>
                            <option selected value="tidak_bisa_dijual">Tidak bisa dijual</option>
                        <?php else : ?>
                            <option value="tidak_bisa_dijual">Tidak bisa dijual</option>
                         <?php endif;  ?>
                         
                    </select>
                    <?php if(errorField('status')) : ?>
                        <div class="text-danger text-sm position-absolute bottom-0 ps-2"><?= errorField('status') ?></div>
                    <?php endif ?>
                </div>
                <div class="mt-2 d-flex justify-content-end"><a href="<?= base_url('/produk') ?>" type="button" class="btn btn-outline-secondary fw-semibold me-3">Kembali</a>
                    <button type="submit" class="btn btn-primary fw-semibold">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection('content') ?>