<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Syifa Hidroponik</title>
</head>

<body>
    <section>
        <?php if (session()->getFlashdata('berhasil')) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= session()->getFlashdata('berhasil') ?>
            </div>
        <?php } elseif (session()->getFlashdata('berhasil')) { ?>
            <div class="alert alert-danger mt-3" role="alert">

                <?= session()->getFlashdata('gagal') ?>
            </div>
        <?php } ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $db      = \Config\Database::connect();
                $builder = $db->table('transaksi');

                $builder->select('*');
                $builder->join('produk', 'produk.kodeproduk = transaksi.kodeproduk');
                $builder->where('notransaksi', $p['notransaksi']);
                $query = $builder->get();
                foreach ($query->getResult() as $p) :
                ?>
                    <tr>
                        <th scope="row"><?= $p->namaproduk; ?></th>
                        <td><?= $p->qty; ?></td>
                        <?php $harga = $p->hargaproduk * $p->qty; ?>
                        <td><?= $harga; ?></td>
                    </tr>
                <?php endforeach
                ?>
            </tbody>
        </table>
        <form action="/admin/updatepackage/<?= $notransaksi; ?>" method="POST" enctype="multipart/form-data">
            <div class="container" style="padding-right: 15em; padding-left: 15em; text-align: center;">

                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Bukti Pembayaran</div>
                    <div class="card-body">
                        <img src="/assets/payment/<?php $p['payment'];
                                                    ?>" alt="bukti pembayaran">
                    </div>
                </div>

                <label for="formFile" class="form-label">Masukan No. Resi Pengiriman</label>
                <input class="form-control" type="input" id="formFile" name="package" required>
                <button type="submit" class="btn btn-success my-3">Kirim</button>


            </div>
        </form>

    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->

</body>

</html>