<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?= $this->include('layout/sidebar'); ?>
        <!-- content -->
        <div class="col py-3">
            <div>
                <h1 class="text-capitalize fs-2">Data Produk</h1>
                <a href="/admin/tambahproduk">
                    <button type="button" class="btn btn-primary">Tambah Produk</button>
                </a>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif ?>

            </div>
            <hr>
            <div>

                <div class="row row-cols-1 row-cols-md-5 g-4 py-4">
                    <?php
                    foreach ($produk as $p) :
                    ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="/assets/uploadimg/<?= $p['gambarproduk']; ?>" class="card-img-top" style="height: 15em; width: auto;">
                                <div class=" card-body">
                                    <h5 class="card-title"><?= $p['namaproduk']; ?></h5>
                                    <p class="card-text col-6 fw-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                        <?= $p['katagori']; ?>
                                    </p>
                                    <p class="card-text"><?= $p['deskripsiproduk']; ?></p>
                                    <div class="cols">
                                        <a href="/admin/editproduk/<?= $p['namaproduk'] ?>">
                                            <button type="button" class="btn btn-primary">edit</button>
                                        </a>
                                        <form action="/admin/deleteproduk/<?= $p['kodeproduk']; ?>" class="d-inline">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin mengahpus postingan ini?')">hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>