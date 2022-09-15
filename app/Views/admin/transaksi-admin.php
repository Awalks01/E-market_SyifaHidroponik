<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?= $this->include('layout/sidebar'); ?>
        <!-- content -->
        <div class="col py-3">
            <div class="title py-1">
                Pesanan Saya
            </div>
            <div class="col-lg-12 mt-2">
                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible"><?= session()->getFlashdata('pesan'); ?></div>
                <?php } ?>
            </div>
            <div>
                <form action="/admin/transaksiadmin" method="POST">
                    <div class="row">
                        <div class="form-floating col-2">
                            <input type="date" class="form-control" id="floatingInput" name="startdate">
                            <label for="floatingInput">Dari Tanggal</label>
                        </div>

                        <div class="form-floating col-2">
                            <input type="date" class="form-control" id="floatingInput" name="enddate">
                            <label for="floatingInput">Sampai Tanggal</label>
                        </div>
                        <div class="form-floating col-2">
                            <button type="submit" class="btn btn-success my-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <div class="row row-cols-1 row-cols-md-5 g-4 ">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="100px">NO.</th>
                                <th scope="col">Pembayaran</th>
                                <th scope="col">Resi</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($transaksi as $t) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $t['notransaksi']; ?></th>
                                    <td><?php if ($t['pembayaran'] != null) {
                                        ?>
                                            <div class="alert alert-success d-flex align-items-center w-1" role="alert" style="width: 20em;">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                                    <use xlink:href="#check-circle-fill" />
                                                </svg>
                                                <div>
                                                    Bukti pembayaran sudah diterima
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="alert alert-warning d-flex align-items-center" role="alert" style="width: 20em;">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                                    <use xlink:href="#exclamation-triangle-fill" />
                                                </svg>
                                                <div>
                                                    Bukti pembayaran belum dikirim
                                                </div>
                                            </div>
                                        <?php
                                        } ?>
                                    </td>
                                    <td><?= $t['no_resi']; ?></td>
                                    <td><?php if ($t['status'] == 2) {
                                        ?>
                                            <div class="alert alert-success d-flex align-items-center w-1" role="alert" style="width: 8em;">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                                    <use xlink:href="#check-circle-fill" />
                                                </svg>
                                                <div>
                                                    Dikirim
                                                </div>
                                            </div>
                                        <?php
                                        } elseif ($t['status'] == 1) {
                                        ?>
                                            <div class="alert alert-warning d-flex align-items-center" role="alert" style="width: 8em;">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                                    <use xlink:href="#exclamation-triangle-fill" />
                                                </svg>
                                                <div>
                                                    Packing
                                                </div>
                                            </div>
                                        <?php
                                        } elseif ($t['status'] == 3) {
                                        ?>
                                            <div class="alert alert-danger d-flex align-items-center" role="alert" style="width: 8em;">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                                    <use xlink:href="#exclamation-triangle-fill" />
                                                </svg>
                                                <div>
                                                    Pesanan Dibatalkan
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        } ?>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $t['notransaksi']; ?>">
                                            Detail
                                        </button>
                                        <!-- Modal | Detail Pesanan -->
                                        <div class="modal fade" id="exampleModal<?= $t['notransaksi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan <?= $t['notransaksi']; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section>
                                                            <form action="/admin/updatepackage/<?= $t['notransaksi']; ?>" method="POST" enctype="multipart/form-data">
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

                                                                        $totalharga = 0;

                                                                        $builder->select('*');
                                                                        $builder->join('produk', 'produk.kodeproduk = transaksi.kodeproduk');
                                                                        $builder->where('notransaksi', $t['notransaksi']);
                                                                        $query = $builder->get();
                                                                        foreach ($query->getResult() as $p) :
                                                                        ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $p->namaproduk; ?></th>
                                                                                <td><?= $p->qty; ?></td>
                                                                                <?php

                                                                                $harga = $p->hargaproduk * $p->qty;
                                                                                $totalharga += $harga; ?>
                                                                                <td><?= $harga; ?></td>
                                                                            </tr>
                                                                        <?php endforeach
                                                                        ?>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th> Total Belanja</th>
                                                                            <td><?= $totalharga; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <div class="container" style="padding-right: 15em; padding-left: 15em; text-align: center;">


                                                                </div>
                                                            </form>

                                                        </section>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endsection(); ?>