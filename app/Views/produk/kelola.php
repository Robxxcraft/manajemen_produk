<?= $this->extend('default') ?>

<?php $this->section('title') ?>
    Kelola Produk | Manajemen Produk
<?php $this->endSection('title') ?>

<?php $this->section('content') ?>
    <div class="p-4 mx-3">
        <div class="fs-5 fw-bold mb-3 text-primary">Kelola Produk</div>
        <a href="<?= base_url('produk/tambah') ?>" class="text-primary link mb-3 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg> 
            Tambah Produk
        </a>
        <?php if(session()->getFlashData('success')) : ?>
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?> 
        <form action="<?= base_url('produk') ?>" method="GET">
            <div class="d-flex align-items-center">
            <div class="text-primary me-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M21 4V6H20L15 13.5V22H9V13.5L4 6H3V4H21ZM6.4037 6L11 12.8944V20H13V12.8944L17.5963 6H6.4037Z"></path></svg>
            </div>
            <select name="filter" id="filter" class="form-control filter text-primary fw-semibold" onchange="this.form.submit()">
                <option disabled class="text-muted" selected value="">Filter</option>
                <?php if (str_replace('filter=','', $_SERVER['QUERY_STRING']) == 'bisa_dijual'): ?>
                    <option selected value="bisa_dijual">Bisa dijual</option>
                <?php else : ?>
                    <option value="bisa_dijual">Bisa dijual</option>
                <?php endif ?>
                <?php if (str_replace('filter=','', $_SERVER['QUERY_STRING']) == 'tidak_bisa_dijual'): ?>
                    <option selected value="tidak_bisa_dijual">Tidak bisa dijual</option>
                <?php else : ?>
                    <option value="tidak_bisa_dijual">Tidak bisa dijual</option>
                <?php endif ?>
            </select>
            </div>
        </form>
        <div class="table-responsive mt-5">
            <table class="table mx-auto table-hover overflow-hidden rounded-1 shadow-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="px-3">#</th>
                        <th class="px-3">Nama Produk</th>
                        <th class="px-3">Harga</th>
                        <th class="px-3">Kategori</th>
                        <th class="px-3">Status</th>
                        <th class="px-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produks as $produk) : ?>
                        <tr>
                            <td class="px-3 text-primary fw-semibold bg-white"><?= $produk['id_produk'] ?></td>
                            <td class="px-3 w-25 text-break bg-white"><?= $produk['nama_produk'] ?></td>
                            <td class="px-3 fw-semibold text-break bg-white">Rp. <?= preg_replace('/\B(?=(\d{3})+(?!\d))/i', ',', $produk['harga'])  ?></td>
                            <td class="px-3 fw-semibold text-secondary text-break bg-white"><?= $produk['kategori'] ?></td>
                            <td class="px-3 fw-semibold <?= $produk['status'] == 'bisa_dijual' ? 'text-success' : 'text-danger' ?> text-break bg-white"><?= ucfirst(str_replace('_', ' ', $produk['status'])) ?></td>
                            <td class="px-3 bg-white">
                                <div class="d-flex align-items-center">
                                    <a href="<?= base_url('produk/edit/'.$produk['id_produk']) ?>" class="rounded fw-semibold btn me-2 btn-warning px-2 py-1 text-white">
                                        Ubah
                                    </a>
                                    <a type="button" onclick="changeId(<?= $produk['id_produk'] ?>)" class="rounded fw-semibold btn btn-danger px-2 py-1 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus produk ini?
            </div>
            <div class="modal-footer border-0">
            <form action="<?= base_url('produk/delete') ?>" method="POST" class="delete-form">
                <input type="hidden" name="id" id="del_id">
                <button type="button" class="btn fw-semibold btn-outline-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn fw-semibold btn-danger">Konfirmasi</button>
            </form>
            </div>
            </div>
        </div>
    </div>
    <script>
        var inp_id = document.getElementById('del_id')
        function changeId(id) {
            inp_id.value = id
        }
    </script>
<?php $this->endSection('content') ?>