<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?= $this->include('layout/sidebar'); ?>
        <!-- content -->
        <div class="col py-3">
            <div>
                <h1 class="text-capitalize fs-2">Data Post</h1>
                <p></p>
                <a href="/admin/tambahpost">
                    <button type="button" class="btn btn-primary">Tambah Postingan Baru</button>
                </a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif ?>

            </div>

            <hr>
            <div>

                <?php
                foreach ($post as $p) :
                ?>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/assets/uploadimg/<?= $p['gambar']; ?>" class="img-fluid rounded-start" alt="..." style="width:200px;height:200px;">
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
                            <div class="col-md-2 m-auto">
                                <div class="cols mx-center">
                                    <a href="/admin/editpost/<?= $p['judul'] ?>">
                                        <button type="button" class="btn btn-primary btn-lg">edit</button>
                                    </a>
                                    <form action="/admin/deletepost/<?= $p['id']; ?>" class="d-inline">
                                        <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('apakah anda yakin ingin mengahpus postingan ini?')">hapus</button>
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
<?= $this->endsection(); ?>