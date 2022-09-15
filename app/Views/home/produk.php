<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">
        <div class="title py-1">
            Produk Syifa Hidroponik
        </div>
        <div>
            <div class="dropdown">
                <!-- filter -->
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter Katagori
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/home/product">Semua</a></li>
                    <?php foreach ($katagori as $k) : ?>
                        <li><a class="dropdown-item" href="/home/producttag/<?= $k['kodekatagori']; ?>"><?= $k['katagori']  ?></a></li>
                    <?php endforeach ?>
                </ul>

                <!-- keranjang -->
                <button class="btn btn-secondary position-relative" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= $totalitem ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <?php if (empty($cart)) {
                        echo '<p class="dropdown-item">Keranjang Kosong</p>';
                    } else { ?>
                        <?php foreach ($cart as $c) : ?>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-body">
                                        <img src="/assets/uploadimg/<?= $c['options']['gambar']; ?>" class="cart-img mx-auto d-block" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $c['name']; ?></h5>
                                        <p class="card-text"><small class="text-muted"><?= $c['qty']; ?> barang</small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <p class="card-text"><small class="text-muted"><?= number_to_currency($c['subtotal'], 'Rp.'); ?></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                        <?php endforeach ?>
                        <a href="/cart/belanja" class="dropdown-item dropdown-footer mx-auto" style="text-align: center;">Cek Keranjang</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-12 mt-2">
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible"><?= session()->getFlashdata('pesan'); ?></div>
            <?php } ?>
        </div>
        <div class="row row-cols-1 row-cols-md-5 g-4 ">
            <?php
            foreach ($produk as $p) :
            ?>

                <div class="col">
                    <?= form_open('cart/add');
                    echo form_hidden('id', $p['kodeproduk']);
                    echo form_hidden('price', $p['hargaproduk']);
                    echo form_hidden('name', $p['namaproduk']);
                    echo form_hidden('gambar', $p['gambarproduk']);
                    ?>
                    <div class="card h-100">
                        <img src="/assets/uploadimg/<?= $p['gambarproduk']; ?>" class="card-img-top" style="height: 15em; width: auto;">
                        <div class="card-body">
                            <a href="/home/detailproduk/<?= $p['namaproduk'] ?>" style=" text-decoration:none; color: black;">
                                <h5 class="card-title"><?= $p['namaproduk']; ?></h5>
                            </a>
                            <p class="card-text col-6 fw-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                </svg>
                                <?= $p['katagori']; ?>
                            </p>
                            <p class="fw-bold">
                                <?= number_to_currency($p['hargaproduk'], 'Rp.'); ?>
                            </p>

                            <button type="submit" href="/#" class="btn btn-success btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                </svg>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>

            <?php endforeach
            ?>

        </div>
    </div>
</section>

<?= $this->endsection(); ?>