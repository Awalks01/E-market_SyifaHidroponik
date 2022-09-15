<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?= $this->include('layout/sidebar'); ?>
        <!-- content -->
        <div class="col py-3">
            <h3>Halo <?= session()->get('username'); ?></h3>
            <p class="lead">Selamat Datang dibagian sistem managemen website Syifa Hidroponik Medan</p>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>