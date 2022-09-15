<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">

        <section id="bannerpost" style="background-image: url(/assets/uploadimg/<?= $post['gambar']; ?>);">
        </section>

        <section class="content">
            <div class="title text-center">
                <?= $post['judul']; ?>
            </div>
            <div class="artikel text-left fw-normal mx-5 mb-4">
                <?= $post['deskripsi']; ?>
            </div>
            <div class="lampiran text-center">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" class="embed-responsive-item" src="<?= $post['link']; ?>" style="max-width: 100%;" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <section>
            <div style="padding-bottom: 10em;"></div>
        </section>
    </div>
</section>

<?= $this->endsection(); ?>