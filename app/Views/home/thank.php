<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<section>
    <link rel="stylesheet" href="/css/thank.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="thankyou-page">
        <div class="_header">
            <div class="logo">
                <img src="https://codexcourier.com/images/banner-logo.png" alt="">
            </div>
            <h1>Terima Kasih</h1>
        </div>
        <div class="_body">
            <div class="_box ">
                <h2>
                    <strong>Pesanan anda sudah diterima</strong> silahkkan upload bukti pembayaran untuk lanjut ke proses pengiriman.
                </h2>
                <p>Terimakasih telah memilih Syifa Hidroponik untuk memenuhi kebutuhan berkebun anda.</p>
            </div>
        </div>
        <div class="_footer">
            <p>Silahkan klik lanjut untuk upload bukti pembayaran</p>
            <div>
                <a class="btn" href="/cart/transaksi">Lanjut</a>
                <a class="btn" href="/home">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endsection(); ?>