<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?= $this->include('layout/sidebar'); ?>
        <!-- content -->
        <div class="col py-3">
            <div>
                <p class="fs-3">Tambah Post Baru</p>
                <hr>
                <form action="/admin/update/<?= $post['id']; ?>" method="POST" enctype="multipart/form-data">
                    <?php csrf_field() ?>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <p>Judul Post</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="judul" value="<?= $post['judul']; ?>">
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <p>Gambar Thumbnail</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="file" name="gambar" value="<?= $post['gambar']; ?>" accept="image/png, image/jpeg">
                            <input class="form-control" type="hidden" name="gambarlama" value="<?= $post['gambar']; ?>">
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <p>Link Video Youtube</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="link" value="<?= $post['link']; ?>">
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <p>Isi Artikel Blog</p>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" name="deskripsi" style="height: 20em;"><?= $post['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="cols">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger" onClick="javascript:window.location.href='/admin/tampilpost'">Batal</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?= $this->endsection(); ?>