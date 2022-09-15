<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">
        <div class="title py-1">
            Produk Syifa Hidroponik
        </div>

        <div class="row g-0">
            <div class="col-md-4">
                <img src="/assets/uploadimg/<?= $produk['gambarproduk']; ?>" width="auto" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-1 fw-bold text-capitalize"><?= $produk['namaproduk']; ?></h5>
                    <p class="card-text w-50"><?= $produk['deskripsiproduk']; ?></p>

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endsection(); ?>