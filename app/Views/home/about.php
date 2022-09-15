<?= $this->extend('layout/hometemplate'); ?>

<?= $this->section('content'); ?>

<!-- About -->
<section id="about">
    <div class="about">
        <div class="container">
            <h1>Syifa Hidroponik Medan</h1>
            <hr class="center">
            <p>Sebuah tempat yang menyediakan perlengkapan dan
                segala macam kebutuhan untuk berkebun dengan sistem hidroponik. </p>
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section id="visi_misi">
    <div class="head-visi_misi">
        <div class="container">
            <h1>Visi Misi</h1>
            <div class="shadow p-3 py-5 mb-5 bg-body rounded">
                <span class="content-visi_misi">
                    <h1>Visi</h1>
                    Terciptanya masyarakat sehat yang diawali dengan konsumsi makanan yang sehat
                    <div class="py-3"></div>
                    <h1>Misi</h1>
                    Terciptanya masyarakat yang kreatif dan Inovatif, dengan cara mempopulerkan Urban Farming yang bisa menghasil-kan Olah Pangan dan sayuran sehat.
                </span>
            </div>
        </div>
    </div>
</section>

<!-- sejarah -->
<section id="sejarah">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/assets/img/jpg1.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8" style="background: #24475B;  margin-bottom: 150px;">
                <div class="card-body" style="color: azure;">
                    <span>
                        <h1>Sejarah</h1>
                        <hr class=" bg-light">
                        <p class="card-text">Syifa Hidroponik memulai percobaan menanam pada lahan yang
                            sempit diawali pada tahun 2014, banyaknya berita tentang segala
                            jenis makanan yang bercampur dengan bahan bahan berbahaya
                            pada makanan seperti pestisida, lapisan lilin pada tanaman dan
                            buah dan bermacam bahan kimia yang dipakai untuk tanaman tersebut,
                            menggugah kami untuk mengupayakan sayuran yang sehat bebas pestisida dan
                            bahan kimia.
                        </p>
                        <p class="card-text">Berawal dari hobi menanam, kamipun mulai belajar tentang hidroponik .
                            Ternyata segala sesuatu hal baru itu bila kita mau belajar dan membaca,
                            Alhamdulillah saat ini kami juga telah banyak memberikan arahan dan menjadi
                            inspirator bagi masyarakat yang ingin bercocok tanam dengan sistem hidroponik.

                        </p>
                        <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div style="padding-bottom: 5em;"></div>
</section>
<?= $this->endsection(); ?>