<?= $this->extend('default') ?>

<?php $this->section('title') ?>
    Home | Manajemen Produk
<?php $this->endSection('title') ?>

<?php $this->section('content') ?>

<div class="w-100 vh-100 pt-5">
    <div class="card w-50 mx-auto border-0 shadow-sm">
        <div class="card-body d-flex flex-column align-items-center">
            <div class="fs-5 fw-bold text-primary mb-3">Manajemen Produk</div>
            <a href="<?= base_url('produk') ?>" type="button" class="btn btn-primary bg-primary fw-semibold">Mulai</a>
        </div>
    </div>
</div>
<?php $this->endSection('content') ?>