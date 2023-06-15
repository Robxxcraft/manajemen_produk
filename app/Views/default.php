<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .background {
            background-color: #f5f5f5;
        }
        .text-primary {
            color: slateblue !important;
        }
        .bg-primary {
            background-color: slateblue !important;
        }
        a {
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
        .filter {
            width: 12rem;
        }
    </style>
</head>
<body>
    <div class="min-vh-100 flex">
        <div class="vh-100 text-white position-fixed bg-primary shadow" style="z-index: 10; width: 20%;">
            <div class="w-100">
                <a href="<?= base_url() ?>" class="d-block text-white px-4 py-3 fw-bold fs-5">
                    Produk</a>
                <div class="mb-3 text-uppercase fw-medium px-4 fw-semibold" style="font-size: 0.78rem;">managements</div>
                
                <a href="<?= base_url() ?>" class="sidebar-link text-white d-block px-4 py-2 mt-1 fw-semibold {{request()->is('petugas/pengembalian') || request()->is('petugas/pengembalian/tambah') || request()->is('petugas/pengembalian/edit') ? 'brown' : ''}}">
                    <i class="fa-solid fa-calendar-check fs-5" style="width: 40px"></i>
                    Dashboard
                </a>
                
                <a href="<?= base_url('produk') ?>" class="sidebar-link text-white d-block px-4 py-2 mt-1 fw-semibold {{request()->is('petugas/pengembalian') || request()->is('petugas/pengembalian/tambah') || request()->is('petugas/pengembalian/edit') ? 'brown' : ''}}">
                    <i class="fa-solid fa-calendar-check fs-5" style="width: 40px"></i>
                    Kelola Produk
                </a>
            </div>
        </div>
        <div class="background position-absolute end-0" style="width: 80%;">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>