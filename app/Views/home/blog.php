<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">
        <div class="title py-1">
            Produk Syifa Hidroponik
        </div>

        <?php
        foreach ($post as $p) :
        ?>
            <a href="/home/detailblog/<?= $p['judul']; ?>" style=" text-decoration:none; color : black;">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="/assets/uploadimg/<?= $p['gambar'] ?>" class="img-fluid rounded-start" alt="..." style="width:200px;height:200px;">
                        </div>
                        <div class="col-md-8 bg-light ">
                            <div class="card-body">
                                <span>
                                    <h1><?= $p['judul']; ?></h1>
                                    <hr class=" bg-light">
                                    <p class="card-text"><?= $p['deskripsi']; ?></p>
                                    <br>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        <?php endforeach
        ?>


    </div>
</section>

<?= $this->endsection(); ?>